<?php


require_once ROOT.'/core/Controller.php';
class CatalogController extends Controller
{
    public function __construct()
    {
        parent::__construct('app');
    }
    public function shop()
    {
    $this->render('shop/shop');
    }
}   