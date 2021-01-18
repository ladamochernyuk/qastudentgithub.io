// <comment
"use strict";

const shoppingCart  = document.getElementById('shopping-cart'); 
const aside = document.querySelector('.aside');
const closeBtn = document.querySelector('.close-btn');

let toggleCart = function(){
    aside.classList.toggle('show-sidebar');
}


shoppingCart.addEventListener('click', toggleCart);

closeBtn.addEventListener('click', function(){
aside.classList.remove('show-sidebar');
});


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

const single = document.querySelector('.single');
const goBack= document.querySelector('.go-back');

//product

function renderShowcase(){
    let addToCarts = document.querySelectorAll('.add-to-cart');

    let productDetails = document.querySelectorAll('.product-detail');

    productDetails.forEach(function(element){
        element.addEventListener('click', function(e){

            let parent = e.target.closest('.product');

            let name = parent.querySelector('.product-name').innerText;

            let price = parent.querySelector('.product-price').innerText;

            let image = parent.querySelector('.product-img').getAttribute('src');

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


    goBack.addEventListener('click', function(){
        single.classList.remove('show-single');
    });

}


function createProduct(data){
    return`
    <div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="product text-center">
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
function makeShowcase(products){
    let result = ""; 

products.forEach(function(element){
    result += createProduct(element);
    document.querySelector('.showcase').innerHTML = result;
});
}

document.addEventListener("DOMContentLoaded", function(){
  closeBtn.addEventListener("click", closeCart);
  sidebarToggle.addEventListener("click", toggleCart);
  makeCaraousel(category);
  makeShowcase(products);
  renderShowcase();
})