<?php
class LoginController extends Controller {
    public $UserModel;
    public function __construct(){
        $this->UserModel = $this->model("User");
    }
    function index(){
        $this->view('Login');
    }

    function register(){
        $this->view('Register');
    }
    public function LoginHandler(){
        if(isset($_POST['btn_login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $result = $this->UserModel->checkUser($username,$password);

            if(!$result) {
                $mgs= "Incorrect username/password!";
                $this->view('Login',['mgs'=>$mgs]);
                return;
            }
            $_SESSION['user_id']=$result['id'];
            $_SESSION['role'] = $result['roles'];
            if($result['roles']==0){
                return $this->redirect("UserController","index",[]);
            }
            return  $this->redirect("AdminController","index",[]);
        }
    }

    public function RegisterHandler(){
        if(isset($_POST['btn_register'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];

            $result = $this->UserModel->addUser($username,$password,$name,$email,$address);

            if(!$result) return;
            $this->view('Login');
        }
    }

    public function Logout(){
        session_destroy();
        return $this->redirect("LoginController","index");
    }

}
?>