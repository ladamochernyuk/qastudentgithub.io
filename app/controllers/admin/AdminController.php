<?php
namespace app\controllers\admin;

use core\Controller;
class AdminController extends Controller
{
    protected static string $layout = 'admin';
    public function __construct()
    {
        parent::__construct();
        if(!$this->isAdmin()){
            $this->redirect("/profile");
        }
    } 
    public function isAdmin(){
        return ($this->role() === "admin") ?? false;
    }
}  