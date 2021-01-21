const aside = document.querySelector(".aside");
const sidebarToggle = document.querySelector(".sidebar-toggle");
const closeBtn = document.querySelector(".close-btn");
const clearCart = document.querySelector(".clear-cart");
const single = document.querySelector(".single");
const goBack = document.querySelector('.go-back');
const cartItems = document.querySelector('.cart-items');

// function toggleCart() {
//     if(single.classList.contains('show-single')){
//         single.classList.remove('show-single');
//     }
    
//     aside.classList.toggle("show");
//     if(aside.classList.contains('show')){
//         cartItems.innerHTML = '';
//         populateCart(cart);
//     }
// }

const toggleCart = () => {
    single.classList.contains('show-single') && single.classList.remove('show-single');
    aside.classList.toggle("show");
    aside.classList.contains('show') && populateCart(cart);
}

// function closeCart() {
//     aside.classList.remove("show");
// }

const closeCart = () =>  aside.classList.remove("show");

const createProduct = (data) => `
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="product text-center" data-id="${data.id}">
            <div class="position-relative mb-3">
                <a class="d-block product-detail" href="#">
                    <img class="img-fluid w-100 product-img" src="${data.image}" alt="${data.name}">
                </a>
                <div class="product-overlay">
                    <ul class="mb-0 list-inline">
                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark add-to-cart">Add to cart</a></li>
                        <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark product-detail"><i class="fas fa-expand"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <h6> <a class="reset-anchor product-name" href="#">${data.name}</a></h6>
            <p class="text-small text-muted">$<span class="product-price">${data.price}</span></p>
        </div>
    </div>
`;
        
function makeShowcase(products) {
    let result = '';
    products.forEach(item => {
        result+=createProduct(item);
    });
    document.querySelector('.showcase').innerHTML = result;
}

function renderShowcase(){
    
    // product-detail
    let productDetails = document.querySelectorAll('.product-detail');
    
    goBack.addEventListener('click', function(){
        single.classList.remove("show-single");
    })
    
    productDetails.forEach(function(element) {
        element.addEventListener("click", function(e){
            let product = getProduct(e.target.closest('.product').dataset.id);
            let contentAbout = document.querySelector('.description_content--about');
            contentAbout.innerHTML = `
            <h1>${product.name}</h1>
                <h2>$${product.price}</h2>
                <div>${product.description}</div>
            `;
            document.querySelector('.product_img').innerHTML = `<img src="${product.image}" alt="">`;
            single.classList.add("show-single");
        });
    });
}

const caraouselItem = (data) =>`
    <div class="caraousel-item">
        <a class="category-item" href="shop.html">
            <img src="${data.image}" alt="${data.name}" height="100" width="250"><strong
            class="category-item-title">${data.name}</strong></a>
    </div>`;

function makeCaraousel(category) {
    let result = '';
    category.forEach(item => {
        result+=caraouselItem(item);
    });
    result += result;
    document.querySelector('.caraousel-track').innerHTML = result;
}
// 

// const getProduct = function(id){
//     return products.find(function(product){
//         return product.id === +(id);
//     });
// };

const getProduct = (id) => products.find((product) => product.id === +(id));


let cart = [];

function addToCartItem(item){
    const div = document.createElement("div");
        div.classList.add("cart-item");
        div.setAttribute('id', 'id'+item.id);
        div.innerHTML = `
            <div class="picture product-img">
                <img src="${item.image}" alt="${item.name}" class="img-fluid w-100">
            </div>
            <div class="product-name p-auto">${item.name}</div>
            <div class="remove-btn text-right">
                <a class="reset-anchor m-auto" href="#">
                    <i class="fas fa-trash-alt" data-id=${item.id}></i>
                </a>
            </div>
            <div class="quantity">
                <div class="border d-flex justify-content-around mx-auto">
                    <i class="fas fa-caret-left inc-dec-btn" data-id=${item.id}></i>
                    <span class="border-1 p-1 amount">${item.amount}</span>
                    <i class="fas fa-caret-right inc-dec-btn" data-id=${item.id}></i>
                </div>
            </div>
            <div class="prices">
                <span class="price">$<span class="product-price">${item.price}</span></span>
                <span class="subtotal">Total: $<span class="product-subtotal">${item.amount*item.price}</span></span>
            </div>
        `;
        cartItems.appendChild(div);
}

function populateCart(cart) {
    cartItems.innerHTML = '';
    cart.forEach(function(item){addToCartItem(item);});
}

// function clear() {
//     cart = [];
//     cartItems.innerHTML = '';
// }

const clear = () => {
    cart = [];
    cartItems.innerHTML = '';
}

const filterItem = (cart, curentItem) => cart.filter(item => item.id !== +(curentItem.dataset.id));
    
const findItem = (cart, curentItem) => cart.find(item => item.id === +(curentItem.dataset.id));

function renderCart() {
    clearCart.addEventListener("click", () => clear());
    cartItems.addEventListener("click", event => {
        // event.preventDefault();
        if (event.target.classList.contains("fa-trash-alt")){
            cart = filterItem(cart, event.target);
            event.target.closest('.cart-item').remove();
        } else if (event.target.classList.contains("fa-caret-right")) {
            let tempItem = findItem(cart, event.target);
            tempItem.amount = tempItem.amount + 1;
            event.target.previousElementSibling.innerText = tempItem.amount;
        } else if (event.target.classList.contains("fa-caret-left")) {
            let tempItem = findItem(cart, event.target);
            if (tempItem !== undefined && tempItem.amount > 1) {
                tempItem.amount = tempItem.amount - 1;
                event.target.nextElementSibling.innerText = tempItem.amount;
            } else {
                cart = filterItem(cart, event.target);
                event.target.closest('.cart-item').remove();
            }
        }
    });
}

document.addEventListener("DOMContentLoaded", function(){
    document.body.style.setProperty( "--categories-length", categories.length );
    closeBtn.addEventListener("click", closeCart);
    sidebarToggle.addEventListener("click", toggleCart);
    makeCaraousel(category);
    makeShowcase(products);
    renderShowcase();

    let addToCarts = document.querySelectorAll('.add-to-cart');

    addToCarts.forEach(function(item) {
        item.addEventListener("click", function(event) {
            let product = getProduct(event.target.closest('.product').dataset.id);

            let exist = cart.some(elem => elem.id === product.id);
            if(exist){
                cart.forEach(elem => {
                    if(elem.id === product.id){
                        elem.amount += 1;
                    }
                })
            }else {
                let cartItem = { ...product, amount: 1 };
                cart = [...cart, cartItem];

            }
        });
    });
    renderCart();
});
