<?php
class AdminController extends Controller {

    public $adminName = "Admin";

    public function __construct(){
        if($_SESSION['user_id']==null) {
            return $this->redirect("LoginController","index");
        }
        if($_SESSION['role'] != 1){
            return $this->redirect("HomeController","index");
        }
        if(isset($_SESSION['user_id'])) $user_id = $_SESSION['user_id'];
        $adminModel = $this->model("User");
        $this->adminName = json_decode($adminModel->getUserById($user_id));    
    }
    
    public function index(){
        $this->view("HomeAdmin",[
            "pages"=>"dashboard",
            "username"=>$this->adminName->{'5'},
        ]);
        return;
    }
    public function products(){
        $this->view("HomeAdmin",[
            "pages"=>"products",
            "username"=>$this->adminName->{'5'},
        ]);
        return;
    }
    public function users(){
        $this->view("HomeAdmin",[
            "pages"=>"users",
            "username"=>$this->adminName->{'5'},
        ]);
        return;
    }
    public function comments(){
        $this->view("HomeAdmin",[
            "pages"=>"comments",
            "username"=>$this->adminName->{'5'},
        ]);
        return;
    }
    public function orders(){
        $this->view("HomeAdmin",[
            "pages"=>"orders",
            "username"=>$this->adminName->{'5'},
        ]);
        return;
    }
    public function help(){
        $this->view("HomeAdmin",[
            "pages"=>"help",
            "username"=>$this->adminName->{'5'},
        ]);
        return;
    }
}
?>