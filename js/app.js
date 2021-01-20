// <comment
"use strict";

const shoppingCart  = document.getElementById('shopping-cart'); 
const aside = document.querySelector('.aside');
const closeBtn = document.querySelector('.close-btn');
const sidebarToggle =document.querySelector('.sidebar-toggle');
const clearCart = document.querySelector('.clear-cart');
const single = document.querySelector('.single');
const goBack = document.querySelector('.go-back');
const cartItems = document.querySelector('.cart-items');

const toggleCart = () => {
    single.classList.contains("show-single") && single.classList.remove("show-single");
    aside.classList.toggle("show");
    aside.classList.contains("show") && populateCart(cart);
        cartItems.innerHTML = '';  
}

function closeCart(){
    aside.classList.remove("show");
}

const createProduct = (data) =>
    `
    <div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="product text-center" data-id="${data.id}">
    <div class="position-relative mb-3">
    <a class= "d-block product-detail" href="#">
        <img src="${data.image}" class="img-fluid w-100 product-img" alt="${data.name}">
    </a>
    <div class="product-overlay">
            <ul class="mb-0 list-inline">
                <li class="list-inline-item mb-0 p-0"><a href="#" class="btn btn-sm"><i class="fas fa-heart"></i></a></li>
                <li class="list-inline-item mb-0 p-0"><a class="btn btn-sm add-to-cart"><i class="fas fa-shopping-bag"></i></a></li>
                <li class="list-inline-item mr-0"><a class="btn btn-sm product-detail product-detail"><i class="fas fa-info-circle"></i></a></li>
            </ul>
        </div>
    </div>
            <h3><a class="product-name" href="#">${data.name}</a></h3>
            <p class="text-muted">$<span class="product-price">${data.price}</span></p>
        </div>
        </div>
    `;

shoppingCart.addEventListener('click', toggleCart);

closeBtn.addEventListener('click', function(){
aside.classList.remove('show-sidebar');
});
//product

function makeShowcase(products){
    let result = ''; 

products.forEach(function(item){
    result += createProduct(item);
});
document.querySelector('.showcase').innerHTML = result;
}

function renderShowcase(){

    let productDetails = document.querySelectorAll('.product-detail');

    goBack.addEventListener('click', function(){
        single.classList.remove("show-single");
    })

    productDetails.forEach(function(element){
        element.addEventListener('click', function(e){

            let parent = e.target.closest('.product');

            let name = parent.querySelector('.product-name').innerText;

            let price = parent.querySelector('.product-price').innerText;

            let about = `
            <h1>${name}</h1>
            <h2>${price}</h2>
            <p>BBBBBBBBBBBB</p>`;


            let contentAbout = document.querySelector('.description_content--about');
            contentAbout.innerHTML = about;

            let image = parent.querySelector('.product-img').getAttribute('src');
            document.querySelector('.product_img').innerHTML = `<img src = "${image}" alt="">`;
            single.classList.add('show-single');
            });
    });

}

//caraousel

function caraouselItem(data){
    return `
<div class="caraousel-item">
    <a class="category-item" href="shop.html"><img src="${data.image}" alt="${data.name}" height="100" width="250">
    <strong class="category-item-title">${data.name}</strong>
    </a>
</div>
    `;
}

function makeCaraousel(category){
    let result = "";
    category.forEach(function(item){
        result += caraouselItem(item);
    });
    result += result;
    document.querySelector('.caraousel-track').innerHTML = result;
}
const getProduct = (id) => products.find((product) =>  product.id === +(id));



function addToCartItem(item){
    const div = document.createElement("div");
        div.classList.add("cart-item");
        div.setAttribute('id', 'id'+item.id);
        div.innerHTML =
    `  <div class="picture product-img">
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
        <i class="fas fa-caret-left" data-id=${item.id}></i>
        <span class="border-1 p-1 amount">1</span>
        <i class="fas fa-caret-right" data-id=${item.id}></i>
    </div>
</div>
<div class="prices">
    <span class="price">$<span class="product-price">${item.price}</span></span>
    <span class="subtotal">Total: $<span class="product-subtotal"></span></span>
</div>
    `;
    cartItems.appendChild(div);
}

function populateCart(cart){
    cart.forEach(function(item){
        addToCartItem(item);
    });
}


const cart = [];


const filterItem = (cart, curentItem) => cart.filter(item => item.id !== +(curentItem.dataset.id));

const findItem = (cart, curentItem) => cart.find(item => item.id === +(curentItem.dataset.id));

const clear = () =>{
    cart = [];
    cartItems.innerHTML = '';
}

function renderCart(){
    clearCart.addEventListener('click', () => clearCart());
    cartItems.addEventListener('click', event => {
        if(event.target.classList.contains("fa-trash-alt")){
            cart = filterItem(cart, event.target);
            event.target.closest(".cart-items").remove();
            
        }
        else if (event.target.classList.contains("fas fa-caret-right")){
            let tmpItem = findItem(cart, event.target);
            tmpItem.amount = tmpItem.amount + 1;
            event.target.previousElementSibling.innerText = tmpItem.amount;
            console.log(cart);
        }
        else if (event.target.classList.contains("fas fa-caret-left")){
            let tmpItem = findItem(cart, event.target);
            if(tmpItem !== undefined && tmpItem.amount > 1) {
            tmpItem.amount = tmpItem.amount - 1;
            event.target.nextElementSibling.innerText = tmpItem.amount;
        }
          else{
              cart = filterItem(cart, event.target);
              event.target.closest('.cart-item').remove();
          }
            
        }
    });

}
document.addEventListener("DOMContentLoaded", function(){
  document.body.style.setProperty("--category-length", category.length);
  closeBtn.addEventListener("click", closeCart);
  makeCaraousel(category);
  makeShowcase(products);
  renderShowcase();

  let addToCarts = document.querySelectorAll('.add-to-cart');

  addToCarts.forEach(function(item) {
    item.addEventListener("click", function(event){
    let product = getProduct(event.target.closest('.product').dataset.id);
        
    let exist = cart.same(elem => elem.id===product.id);
        if (exist){
            cart.forEach(elem => {
                if(elem.id === product.id){
                    elem.amount +=1;
                }
            })
        }else{
        let cartItem = {...product, amount:1};
        cart = [... cart, cartItem];
        }
    })
});
renderCart()
});
