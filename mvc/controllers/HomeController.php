<?php

class HomeController extends Controller{
    public $userName = "User";
    public $productModel;

    public function __construct(){
        // if($_SESSION['user_id']==null) {
        //     return $this->redirect("LoginController","index");
        // }
        $this->productModel = $this->model("ProductModel");    
        if(isset($_SESSION['username'])) $this->userName = $_SESSION['username']; 
    }

    public function index(){
        // send username to header
        $this->view("Home",[
            "pages"=>"home"
        ]);
    }


    public function hiring(){
        $this->view("Home",[
            "pages"=>"hiring"
        ]);
    }

    public function products(){
        // send username to header
        $products = $this->productModel->get_all_products();
        $products = json_decode($products,true);
        
        $this->view("Home",[
            "pages"=>"products",
            "product_list"=>$products,
        ]);
        return;
    }
    public function product_detail($id){

        $product = $this->productModel->get_product_by_id($id);
        $product = json_decode($product,true);
        $this->view("Home",[
            "pages"=>"product_detail",
            "product_info"=>$product,
        ]);
        return;
    }    
}
?>