<?php
class ProductModel extends DB {
    public function get_all_products(){
        $sql = "SELECT * FROM products WHERE is_deleted=0;";
        $rows = mysqli_query($this->con, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return json_encode($arr);
    }

    public function get_product_by_id($product_id){
        $sql = "SELECT * FROM products WHERE id='$product_id' LIMIT 1;";
        $row = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($row);
        return json_encode($row);
    }

    public function count_products(){
        $sql = "SELECT count(*) FROM products;";
        $row = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($row);
        return json_encode($row);
    }
    
    public function top_products_sale(){
        $sql = "SELECT count(orders.id), products.name FROM orders JOIN products ON orders.id_product=products.id GROUP BY orders.id_product LIMIT 7;";
        $rows = mysqli_query($this->con, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return json_encode($arr);
    }

    public function add_product($type,$name,$number,$description,$price,$discount,$imagename){
        $sql = "INSERT INTO products(type, name, number, description, price, discount, image) VALUES ('$type', '$name','$number', '$description', '$price', '$discount','$imagename');";
        $result = false;
        if(mysqli_query($this->con,$sql)){
            $result=true;
        }
        return json_encode($result);
    }
    public function update_product($type,$name,$number,$description,$price,$discount,$imagename, $id){
       
        $sql = "UPDATE products SET type='$type', name='$name', number=$number, description='$description', price=$price, discount=$discount, image='$imagename' WHERE id=$id;";

        if(!$imagename){
            $sql = "UPDATE products SET type='$type', name='$name', number=$number, description='$description', price=$price, discount=$discount WHERE id=$id;";
        }
        
        $result = false;
        if(mysqli_query($this->con,$sql)){
            $result=true;
        }
        return json_encode($result);
    }
    public function delete_product($id){
        $sql = "UPDATE products SET is_deleted = 1 WHERE id=$id;";
        $result = false;
        if(mysqli_query($this->con,$sql)){
            $result=true;
        }
        return json_encode($result);
    }
    public function listen_search($input){
        $sql = "SELECT * FROM products WHERE type LIKE '%$input%' OR name LIKE '%$input%';";
        $rows = mysqli_query($this->con, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return json_encode($arr);
    }
}
?>