<?php
class AjaxController extends Controller {

    public $userModel;
    public function __construct(){
        $this->userModel = $this->model("UserModel");
    }

    public function check_username(){
        $input = $_POST['input'];
        echo $this->userModel->check_username($input);
    }
}
?>