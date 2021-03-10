<?php
namespace app\controllers\admin;


class dashboardcontroller extends AdminController
{

    public function __construct()
    {
        parent::__construct();
    } 
    public function index()
    {
        $this->render('admin/index', ['title' => 'admin dashboard']);
    }
}   

