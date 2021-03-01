<?php
require_once ROOT.'/core/Controller.php';
class dashboardcontroller extends Controller
{

    public function __construct()
    {
        parent::__construct('admin');
    } 
    public function index()
    {
        $this->render('admin/index', ['title' => 'admin dashboard']);
    }
}   

