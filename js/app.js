// <comment
"use strict";

const shoppingCart  = document.getElementById('shopping-cart'); 
const aside = document.querySelector('.aside');
const closeBtn = document.querySelector('.close-btn');
const sidebarToggle =document.querySelector('.sidebar-toggle');
const clearCart = document.querySelector('.clear-cart');
const single = document.querySelector('.single');
const goBack = document.querySelector('.go-back');
const cartItem = document.querySelector('.cart-item');

function toggleCart(){
    if(single.classList.contains("show-sidebar")){
        single.classList.remove("show-sidebar");
    };
    aside.classList.toggle("show");
    if (single.classList.contains("show")){
        cartItem.innerHTML = '';
        populateCart(cart);
    }
}

function closeCart(){
    aside.classList.remove("show");
}

function createProduct(data){
    return`
    <div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="product text-center" data-id="${data.id}">
    <div class="position-relative mb-3">
    <a class= "d-block product-detail" href="#">
        <img src="${data.image}" class="img-fluid w-100 product-img">
    </a>
    <div class="product-overlay">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="" class="btn btn-sm"><i class="fas fa-heart"></i></a></li>
                <li class="list-inline-item"><a href="" class="btn btn-sm add-to-cart"><i class="fas fa-shopping-bag"></i></a></li>
                <li class="list-inline-item"><a href="#" class="btn btn-sm product-detail" title="Product detail"><i class="fas fa-info-circle"></i></a></li>
            </ul>
        </div>
    </div>
            <h3 class="product-name">${data.name}</h3>
            <p class="text-muted"><span class="product-price">${data.price}</span></p>
        </div>
        </div>
    `;
}
shoppingCart.addEventListener('click', toggleCart);

closeBtn.addEventListener('click', function(){
aside.classList.remove('show-sidebar');
});




//product

function makeShowcase(products){
    let result = ""; 

products.forEach(function(element){
    result += createProduct(element);
});
document.querySelector('.showcase').innerHTML = result;
}

function renderShowcase(){

    let productDetails = document.querySelectorAll('.product-detail');

    goBack.addEventListener('click', function(){
        single.classList.remove('show-single');
    });

    productDetails.forEach(function(element){
        element.addEventListener('click', function(e){

            let parent = e.target.closest('.product');

            let name = parent.querySelector('.product-name').innerText;

            let price = parent.querySelector('.product-price').innerText;

            let about = `
            <h1>${image}</h1>
            <h2>${price}</h2>
            <p>BBBBBBBBBBBB</p>`

            let contentAbout = document.querySelector('.description_content--about');
            contentAbout.innerHTML = about;

            let image = parent.querySelector('.product-img').getAttribute('src');
            document.querySelector('.product_img').innerHTML = `<img src = "${image}"`;
            single.classList.add('show-single');
            });
    });

};

//caraousel

function caraouselItem(data){
    return `
<div class="caraousel-item">
    <a href="#" class="category-item"><img src="${data.image}" alt="${data.name}" height="100" width="250">
    <strong class="category-item-title">${data.name}</strong>
    </a>
</div>
    `
}

function makeCaraousel(category){
    let result = "";
    category.forEach(function(element){
        result += caraouselItem(element);
    });
    result += result;
    document.querySelector('.caraousel-track').innerHTML = result;
}
const getProducts = function(id){
    return products.find(function(product){
        return products.id === +(id)
    });
}

let cart = [];

function addToCartItem(item){
    
    `  <div class="picture product-img">
    <img src="${item.image}" alt="${item.name}" class="img-fluid w-100">
</div>
<div class="product-name p-auto">${item.name}</div>
<div class="remove-btn text-right">
    <a class="reset-anchor m-auto" href="#">
        <i class="fas fa-trash-alt"></i>
    </a>
</div>

<div class="quantity">
    <div class="border d-flex justify-content-around mx-auto">
        <i class="fas fa-caret-left"></i>
        <span class="border-1 p-1 amount">1</span>
        <i class="fas fa-caret-right"></i>
    </div>
</div>
<div class="prices">
    <span class="price">$<span class="product-price">${item.price}</span></span>
    <span class="subtotal">Total: $<span class="product-subtotal"></span></span>
</div>
    `;
}

function populateCart(cart){
    cart.forEach(function(item){
        addToCartItem(item);
    });
}

document.addEventListener("DOMContentLoaded", function(){
  document.body.style.setProperty("--category-length", category.length);
  closeBtn.addEventListener("click", closeCart);
  makeCaraousel(category);
  makeShowcase(products);
  renderShowcase();

let addToCarts = document.querySelectorAll('.add-to-cart');
addToCarts.forEach(function(item){
    item.addEventListener('click', function(event){
        let product = getProducts(event.target.closest('.product').data.id);
        cart.push(product);

    });
});
});
