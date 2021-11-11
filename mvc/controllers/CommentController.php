<?php
class CommentController extends Controller {
    public $adminName = "Admin";
    public $commentModel;

    public function __construct(){
        if($_SESSION['user_id']==null) {
            return $this->redirect("LoginController","index");
        }
        if($_SESSION['role'] != 1){
            return $this->redirect("CustomerController","index");
        }
        $this->commentModel = $this->model("CommentModel");

        if(isset($_SESSION['username'])) $this->adminName = $_SESSION['username'];
           
    }

    public function index(){

        $orders = json_decode($this->commentModel->get_all_comments(),true);
        if(!$orders) $orders=[];
        $this->view("HomeAdmin",[
            "pages"=>"comments",
            "username"=>$this->adminName,
            "comment_list"=>$orders,
        ]);
        return;
    }
    public function hide_comment(){
        if(isset($_POST['btn_hide'])){
            $comment_id = $_POST['comment_id'];
            $result = $this->commentModel->hide_comment($comment_id);
            if(!$result) return;
            return $this->redirect("CommentController","index",[]);
        }
        return;

    }

}
?>