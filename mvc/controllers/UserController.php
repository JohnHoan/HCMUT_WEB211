<?php
class UserController extends Controller {
    public $adminName = "Admin";
    public $userModel;

    public function __construct(){
        if($_SESSION['user_id']==null) {
            return $this->redirect("LoginController","index");
        }
        if($_SESSION['role'] != 1){
            return $this->redirect("CustomerController","index");
        }

        $this->userModel = $this->model("UserModel");
        if(isset($_SESSION['username'])) $this->adminName = $_SESSION['username'];
    }

    public function index(){
        $users = $this->userModel->get_all_users();
        $users = json_decode($users, true);
        $this->view("HomeAdmin",[
            "pages"=>"users",
            "username"=>$this->adminName,
            "user_list"=>$users,
        ]);
        return;
    }

    public function add_user(){
        if(isset($_POST['btn_add'])){
            $username = $this->check_input($_POST['username']);
            $password = $this->check_input($_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $name = $this->check_input($_POST['name']);
            $email = $this->check_input($_POST['email']);
            $address = $this->check_input($_POST['address']);

            $result = $this->userModel->add_user($username,$password,$name,$email,$address);

            if(!$result) return;
            return $this->redirect("UserController","index",[]);
        }
        $this->view("HomeAdmin",[
            "helper"=>"add_user",
            "username"=>$this->adminName,
        ]);
        return;
    }
    public function update_user(){
        if(isset($_POST['btn_edit'])){
            $user_id = $_POST['user_id'];
            $user = json_decode($this->userModel->get_user_by_id($user_id),true);
            $this->view("HomeAdmin",[
                "helper"=>"update_user",
                "username"=>$this->adminName,
                "user_info"=>$user,
            ]);
            return;
        }
        if(isset($_POST['btn_update'])){
            $id = $_POST['user_id'];
            $name = $this->check_input($_POST['name']);
            $email = $this->check_input($_POST['email']);
            $address = $this->check_input($_POST['address']);
            $role = $_POST['role'];
            $status = $_POST['status'];

            $result = $this->userModel->update_user($name,$email,$address,$role,$status,$id);

            if(!$result) return;
            
            return $this->redirect("UserController","index",[]);
        }
        if(isset($_POST['btn_delete'])){
            $id = $_POST['user_id'];

            $result = $this->userModel->delete_user($id);
            if(!$result) return;
            return $this->redirect("UserController","index",[]);
        }
    }
    public function update_my_account(){
        if(isset($_SESSION['user_id'])) $user_id = $_SESSION['user_id'];
        $user = json_decode($this->userModel->get_user_by_id($user_id),true);
            $this->view("HomeAdmin",[
                "helper"=>"update_user",
                "username"=>$this->adminName,
                "user_info"=>$user,
            ]);
        return;
    }
}
?>