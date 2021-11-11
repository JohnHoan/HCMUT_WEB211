<?php
class ProductController extends Controller {
    public $adminName = "Admin";
    public $productModel;

    public function __construct(){
        if($_SESSION['user_id']==null) {
            return $this->redirect("LoginController","index");
        }
        if($_SESSION['role'] != 1){
            return $this->redirect("CustomerController","index");
        }
        $this->productModel = $this->model("ProductModel");
        if(isset($_SESSION['username'])) $this->adminName = $_SESSION['username'];
    }

    public function index(){
        $products = $this->productModel->get_all_products();
        $products = json_decode($products,true);
        $this->view("HomeAdmin",[
            "pages"=>"products",
            "username"=>$this->adminName,
            "product_list"=>$products,
        ]);
        return;
    }

    public function add_product(){
        if(isset($_POST['btn_add'])){   
            $type = $_POST['type'];
            $name = $_POST['name'];
            $number = (int)$_POST['number'];
            $description = $_POST['description'];
            $price = (float)$_POST['price'];
            $discount = (float)$_POST['discount'];
            $imagename = $this->save_image();

            if(!$imagename) $imagename="product_default.png";

            $result = $this->productModel->add_product($type,$name,$number,$description,$price,$discount,$imagename);
            
            if(!$result) return;
            return $this->redirect("ProductController","index",[]);
        }
        $this->view("HomeAdmin",[
            "helper"=>"add_product",
            "username"=>$this->adminName,
        ]);
        return;
    }

    public function save_image(){
        $filename;
        if(isset($_FILES['productImage']) && $_FILES['productImage']['error']== UPLOAD_ERR_OK){
            $allowType = [IMAGETYPE_JPEG=>'.jpg',IMAGETYPE_PNG=>'.png',IMAGETYPE_GIF=>'.gif'];
            $info = getimagesize($_FILES['productImage']['tmp_name']);
            if(!$info){
                echo "ERROR!";
            }else if(!array_key_exists($info[2],$allowType)){
                echo "ERROR1!";
            }else{
                $path = getcwd().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'product_images'.DIRECTORY_SEPARATOR;
                $filename = uniqid().$allowType[$info[2]];
                move_uploaded_file($_FILES['productImage']['tmp_name'],$path.$filename);
                return $filename;
            }
            
        }
        return false;
    }
    public function update_product(){
        if(isset($_POST['btn_edit'])){
            $product_id = $_POST['product_id'];
            $product = json_decode($this->productModel->get_product_by_id($product_id),true);
            $this->view("HomeAdmin",[
                "helper"=>"update_product",
                "username"=>$this->adminName,
                "product_info"=>$product,
            ]);
            return;
        }
        if(isset($_POST['btn_update'])){
            $id = $_POST['product_id'];
            $type = $_POST['type'];
            $name = $_POST['name'];
            $number = (int)$_POST['number'];
            $description = $_POST['description'];
            $price = (float)$_POST['price'];
            $discount = (float)$_POST['discount'];
            $imagename = $this->save_image();

            $result = $this->productModel->update_product($type,$name,$number,$description,$price,$discount,$imagename, $id);
            
            if(!$result) return;
            return $this->redirect("ProductController","index",[]);
        }
        if(isset($_POST['btn_delete'])){
            $id = $_POST['product_id'];

            $result = $this->productModel->delete_product($id);
            if(!$result) return;
            return $this->redirect("ProductController","index",[]);
        }
    }
    
}
?>