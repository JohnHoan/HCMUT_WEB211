<?php
class DashboardController extends Controller {

    public $adminName = "Admin";
    public $userModel;
    public $productModel;
    public $orderModel;

    public function __construct(){
        if($_SESSION['user_id']==null) {
            return $this->redirect("LoginController","index");
        }
        if($_SESSION['role'] != 1){
            return $this->redirect("CustomerController","index");
        }

        $this->userModel = $this->model("UserModel");
        $this->productModel = $this->model("ProductModel");
        $this->orderModel = $this->model("OrderModel");

        if(isset($_SESSION['username'])) $this->adminName = $_SESSION['username'];
           
    }
    
    public function index(){
        $numUserActive = json_decode($this->userModel->count_active_user(),true);
        $numProducts = json_decode($this->productModel->count_products(),true);
        $numOrdersToday = json_decode($this->orderModel->count_orders_today(),true);
        $numIncomeToday = json_decode($this->orderModel->count_income_today(),true);
        if(!$numIncomeToday) $numIncomeToday='0';
        $topProductsSale = json_decode($this->productModel->top_products_sale(),true);
        $topProductsSale = $this->process_data_top_sales($topProductsSale);
        $ordersWeekly = json_decode($this->orderModel->orders_weekly(),true);
        $ordersWeekly = $this->process_data_orders_weekly($ordersWeekly);
        $this->view("HomeAdmin",[
            "pages"=>"dashboard",
            "username"=>$this->adminName,
            "num_user_active"=>$numUserActive,
            "num_products"=> $numProducts,
            "num_orders_today"=>$numOrdersToday,
            "num_income_today"=>$numIncomeToday,
            "top_products_sale"=>$topProductsSale,
            "orders_weekly"=>$ordersWeekly,
        ]);
        return;
    }

    private function process_data_top_sales($dataset){
        $result=array();
        foreach($dataset as $data){
            $row=array("y"=>$data['num'],"label"=>$data['name']);
            $result[] =$row;
        }
        return $result;
    }
    private function process_data_orders_weekly($dataset){
        $result=array();
        foreach($dataset as $data){
            $time = strtotime($data['day']);
            $day = date('M d',$time);
            $row=array("y"=>$data['num'],"label"=>$day);
            $result[] =$row;
        }
        return $result;
    }

    public function help(){
        $this->view("HomeAdmin",[
            "pages"=>"help",
            "username"=>$this->adminName,
        ]);
        return;
    }
}
?>