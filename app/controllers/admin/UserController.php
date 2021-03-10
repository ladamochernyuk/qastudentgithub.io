<?php
namespace app\controllers\admin;

use app\models\{User, Role};
class UserController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    } 
    public function index(){
       
        $users = (new User())->all();
        $this->render('admin/users/index', ['users'=>$users]);
    }
    public function create(){
        $roles = (new User())->all();
        $this->render('admin/users/create', compact('roles'));

    }
    public function store(){
        $password = $this->request->input['password'];
        [$name, $domain] = explode('@', $this->request->input['email']);
    
        $hash = password_hash($password, PASSWORD_BCRYPT, $this->costs);
        (new User)->save(['name'=>$name, 'email'=>$this->request->input['email'], 'password'=>$hash,'role_id' => $this->request->input['role_id']]);


        (new User())->save([
            'name' => $this->request->input['name'],
            'status' => $status ?? 0
        ]);
            $this->redirect = ('/admin/users');
           
    }    
    public function edit($params){
            extract($params);
            $brand = (new User())->getByPk($id);
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