<?php

require_once ROOT.'/core/Controller.php';
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
}   
