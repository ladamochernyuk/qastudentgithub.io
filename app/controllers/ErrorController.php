<?php
require_once ROOT.'/core/Controller.php';

class ErrorController extends Controller
{
    public function __construct()
    {
        parent::__construct('app');
    }
    public function error($errors)
    {
    $this->render('errors/index', $errors);
    }  

}