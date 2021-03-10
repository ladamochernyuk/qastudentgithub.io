<?php
namespace app\controllers\admin;

use app\models\Brand;
class BrandController extends AdminController
{
   
    public function __construct()
    {
        parent::__construct();
    } 
    public function index(){
       
        $brands = (new Brand())->all();
        $this->render('admin/brands/index', ['brands'=>$brands]);
    }
    public function create(){
        $this->render('admin/brands/create');

    }
    public function store(){
        $status = $this->request->input['status'] ? 1:0;

        (new Brand())->save([
            'name' => $this->request->input['name'],
            'status' => $status
        ]);
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/brands';
            header("Location: $redirect");
    }    
    public function edit($params){
            extract($params);
            $brand = (new Brand())->getByPk($id);
            $this->render('admin/brands/edit', ['brand'=>$brand]);
    
    }
    public function update(){
        $status = $this->request->input['status'] ? 1:0;

        (new Brand())->update($this->request->input['id'], [
            'name' => $this->request->input['name'],
            'status' => $status ?? 0
        ]);
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/brands';
            header("Location: $redirect");       
}
    public function delete($params){
            extract($params);
            if(isset($this->request->input['submit'])){
                (new Brand())->destroy($id);
                $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/brands';
                header("Location: $redirect");
                exit();
            }elseif(isset($this->request->input['reset'])){
                $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/brands';
                header("Location: $redirect");
                exit();
            }

            $brand = (new Brand())->getByPk($id);
            $this->render('admin/brands/delete', ['brand'=>$brand]);
           
    
     }
    
}