<?php
class OrderController extends Controller {
    public $adminName = "Admin";
    public $orderModel;

    public function __construct(){
        if($_SESSION['user_id']==null) {
            return $this->redirect("LoginController","index");
        }
        if($_SESSION['role'] != 1){
            return $this->redirect("CustomerController","index");
        }
        $this->orderModel = $this->model("OrderModel");

        if(isset($_SESSION['username'])) $this->adminName = $_SESSION['username'];
           
    }

    public function index(){

        $orders = json_decode($this->orderModel->get_all_orders(),true);
        $this->view("HomeAdmin",[
            "pages"=>"orders",
            "username"=>$this->adminName,
            "order_list"=>$orders,
        ]);
        return;
    }

    public function update_paid(){
        if(isset($_POST['btn_update'])){
            $order_id = $_POST['order_id'];
            $result = $this->orderModel->update_order($order_id);
            if(!$result) return;
            return $this->redirect("OrderController","index",[]);
        }
        return;

    }
}
?>