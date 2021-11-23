<?php

class CartController extends Controller{
    public $userName = "User";
    public $cartModel;

    public function __construct(){
        if($_SESSION['user_id']==null) {
            return $this->redirect("LoginController","index");
        }
        $this->cartModel = $this->model("CartModel");    
        if(isset($_SESSION['username'])) $this->userName = $_SESSION['username']; 
    }

    public function index(){
        $user_id = $_SESSION['user_id'];
        $cart_info = $this->cartModel->view_cart($user_id);
        $cart_info = json_decode($cart_info,true);
        if(empty($cart_info)){
            $this->view("Home",[
                "pages"=>"cart_empty",
                "username"=>$this->userName,
            ]);
            return;
        }
        $this->view("Home",[
            "pages"=>"cart",
            "username"=>$this->userName,
            "cart_info"=>$cart_info,
        ]);
    }
    public function add_to_cart(){
        if(isset($_POST['btn_add'])){
            $product_id = $_POST['product_id'];
            $number=1;
            if(isset($_POST['number'])) $number = $_POST['number'];
            $user_id = $_SESSION['user_id'];
            $result = $this->cartModel->add_to_cart($product_id,$user_id,1);
            if(!$result) return;
            return $this->redirect("CartController", "index");
        }
    }

    public function update_item(){
    
        $input = $_POST['input'];
        $id = $_POST['id'];
        $result = $this->cartModel->update_item($id,$input);
        if(!$result) echo false;
        echo true;
    }


    public function insert_to_order(){
        $user_id = $_SESSION['user_id'];
        $cart_info = $this->cartModel->view_cart($user_id);
        $cart_info = json_decode($cart_info,true);

        try {
            $orderModel = $this->model("OrderModel");
            $note = "mua";
            foreach($cart_info as $item){ 
                extract($item);
                $orderModel->add_to_order($note, $item['number'],$item['money_per_unit'],1,$item['product_id'],$user_id);
                $this->cartModel->delete_item($item['id']);
            }
            echo true;
        }
        catch(Exception $e) {
            echo false;
        }
    }

    public function delete_item(){
        if(isset($_POST['btn_delete'])){
            $item_id = $_POST['item_id'];
            $result = $this->cartModel->delete_item($item_id);
            if(!$result) return;
            return $this->redirect("CartController", "index");
        }
        return;
    }
}
?>