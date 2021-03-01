<?php

require_once ROOT.'/core/Controller.php';
require_once ROOT.'/app/models/Product.php';
class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct('app');
    }
    public function home()
    {
    $this->render('home/home');
    }

public function getProducts(){
    $sql = "SELECT products.*, categories.name as category, categories.id as categoryId FROM products INNER JOIN categories ON categories.id = products.category_id";

    $products = (new Product())->runSql($sql);
    echo json_decode($products);
}
}   
