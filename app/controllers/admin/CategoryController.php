<?php

require_once APP.'/models/Category.php';
require_once ROOT.'/core/Controller.php';
class CategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct('admin');
    } 
    public function index(){
       
        $categories = (new Category())->all();
        $this->render('admin/categories/index', ['categories'=>$categories]);
    }
    public function create(){
        $this->render('admin/categories/create');

    }
    public function store(){
        $status = $this->request->input['status'] ? 1:0;

        (new Category())->save([
            'name' => $this->request->input['name'],
            'status' => $status ?? 0
        ]);
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
            header("Location: $redirect");
    }    
    public function edit($params){
            extract($params);
            $category = (new Category())->getByPk($id);
            $this->render('admin/categories/edit', ['category'=>$category]);
    
    }
    public function update(){
        $status = $this->request->input['status'] ? 1:0;

        (new Category())->update($this->request->input['id'], [
            'name' => $this->request->input['name'],
            'status' => $status ?? 0
        ]);
       
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
            header("Location: $redirect");       
}
    public function delete($params){
            extract($params);
            if(isset($this->request->input['submit'])){
                (new Category())->destroy($id);
                $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
                header("Location: $redirect");
                exit();
            }elseif(isset($this->request->input['reset'])){
                $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
                header("Location: $redirect");
                exit();
            }

            $category = (new Category())->getByPk($id);
            $this->render('admin/categories/delete', ['category'=>$category]);
           
    
     }
    
}