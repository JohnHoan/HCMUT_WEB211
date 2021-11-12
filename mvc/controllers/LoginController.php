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
            $username = $_POST['username'];
            $password = $_POST['password'];
            
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
                return $this->redirect("CustomerController","index",[]);
            }
            return  $this->redirect("DashboardController","index",[]);
        }
    }

    public function register_handler(){
        if(isset($_POST['btn_register'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];

            $result = $this->userModel->add_user($username,$password,$name,$email,$address);

            if(!$result) return;
            $this->view('Login');
        }
    }

    public function logout(){
        session_destroy();
        return $this->redirect("LoginController","index");
    }

}
?>