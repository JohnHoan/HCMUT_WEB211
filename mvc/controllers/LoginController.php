<?php
class LoginController extends Controller {
    public $userModel;
    public function __construct(){
        $this->userModel = $this->model("UserModel");
    }
    function index(){
        $this->view('Login');
    }

    function register(){
        $this->view('Register');
    }
    public function login_handler(){
        if(isset($_POST['btn_login'])){
            $username = $this->check_input($_POST['username']);
            $password = $this->check_input($_POST['password']);
            
            $result = json_decode($this->userModel->check_user($username,$password),true);
            if(!$result) {
                $mgs= "Incorrect username/password!";
                $this->view('Login',['mgs'=>$mgs]);
                return;
            }
            $_SESSION['user_id']=$result['id'];
            $_SESSION['role'] = $result['roles'];
            $_SESSION['username'] = $result['name'];
            if($result['roles']==0){
                return $this->redirect("HomeController","index",[]);
            }
            return  $this->redirect("DashboardController","index",[]);
        }
    }

    public function register_handler(){
        if(isset($_POST['btn_register'])){
            $username = $this->check_input($_POST['username']);
            $password = $this->check_input($_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $name = $this->check_input($_POST['name']);
            $email = $this->check_input($_POST['email']);
            $address = $this->check_input($_POST['address']);

            $result = $this->userModel->add_user($username,$password,$name,$email,$address);

            if(!$result) return;
            $this->view('Login');
        }
    }

    public function logout(){
        session_destroy();
        return $this->redirect("HomeController","index");
    }

}
?>