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
    'admin/categories/edit/{id}' => 'admin\CategoryController@edit',
    'admin/categories/delete/{id}' => 'admin\CategoryController@delete'
];