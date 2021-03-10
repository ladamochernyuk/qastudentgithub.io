<?php

return [
    '' => 'HomeController@home',
    'shop' => 'CatalogController@shop',
    'contact' => 'ContactController@contact',
    'admin' => 'admin\dashboardcontroller@index',
    'admin/contact' => 'admin\ContactController@contact',
    'admin/contact/list' => 'admin\ContactController@list',
    'admin/categories' => 'admin\CategoryController@index',
    'admin/categories/create' => 'admin\CategoryController@create',
    'admin/categories/store' => 'admin\CategoryController@store',
    'admin/categories/update' => 'admin\CategoryController@update',
    'admin/categories/edit/{id}' => 'admin\CategoryController@edit',
    'admin/categories/delete/{id}' => 'admin\CategoryController@delete',

    'admin/brands' => 'admin\BrandController@index',
    'admin/brands/create' => 'admin\BrandController@create',
    'admin/brands/store' => 'admin\BrandController@store',
    'admin/brands/update' => 'admin\BrandController@update',
    'admin/brands/edit/{id}' => 'admin\BrandController@edit',
    'admin/btands/delete/{id}' => 'admin\BrandController@delete',


    'admin/users' => 'admin\UserController@index',
    'admin/users/create' => 'admin\UserController@create',
    'admin/users/store' => 'admin\UserController@store',

    'admin/products' => 'admin\ProductController@index',
    'admin/products/create' => 'admin\ProductController@create',
    'admin/products/store' => 'admin\ProductController@store',
    'admin/products/update' => 'admin\ProductController@update',
    'admin/products/edit/{id}' => 'admin\ProductController@edit',
    'admin/products/delete/{id}' => 'admin\ProductController@delete',

    'api/products' => 'HomeController@getProducts',
    'api/cart' => 'OrderController@cart',


    'register' => 'RegisterController@signup',
    'login' => 'LoginController@signin',
    'logout' => 'LoginController@logout',
    'profile' => 'ProfileController@index',
];