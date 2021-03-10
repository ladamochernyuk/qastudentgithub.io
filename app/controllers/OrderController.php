<?php


require_once ROOT."/core/BaseController.php";
require_once ROOT."/app/models/User.php";
require_once ROOT."/app/models/Order.php";
class OrderController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if($userId=$this->session()->get('userId')){
            $this->user = (new User)->getByPk($userId);
        }else{
            $this->user = null;
        }
    }
    public function cart()
    {
        if(!$this->user){
            $this->redirector->redirect("/#login");
    }
        if(strtoupper($_SERVER['REQUEST_METHOD']) != 'POST'){
            throw new Exception('Only POST request are allowed');
    }
        $content_type = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER["CONTENT_TYPE"] : '';
        if(stripos($content_type, 'application/json') === false){
            throw new Exception('Content-Type must be application/json');
        }else{
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            if(!is_array($decoded)){
                throw new Exception('Failed to decode JSON object');
            }
            $productsInCart = json_encode($decoded['cart']);
            (new Order)->save([
                'user_id' => $this->user->id,
                'products' => $productsInCart
            ]);
            $options = array(
                'error' => false,
                'message' => 'Everything OK',
             );
 
             echo json_encode($options);
         }
     }
 }