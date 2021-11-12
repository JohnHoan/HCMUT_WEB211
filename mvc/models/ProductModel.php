<?php
class ProductModel extends DB {
    public function get_all_products(){
        $sql = "SELECT * FROM products WHERE is_deleted=?";
        $stmt = $this->prepared_query($this->con, $sql,[0]);
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return json_encode($result);
    }

    public function get_product_by_id($product_id){
        $sql = "SELECT * FROM products WHERE id=? LIMIT ?";
        $stmt = $this->prepared_query($this->con, $sql,[$product_id,1]);
        $result = $stmt->get_result()->fetch_assoc();
        return json_encode($result);
    }

    public function count_products(){
        $sql = "SELECT count(id) FROM products WHERE ?";
        $stmt = $this->prepared_query($this->con,$sql,[1]);
        $result = $stmt->get_result()->fetch_row();
        return json_encode($result);
    }
    
    public function top_products_sale(){
        $sql = "SELECT count(orders.id) AS num, products.name FROM orders JOIN products ON orders.id_product=products.id GROUP BY orders.id_product LIMIT ?";
        $stmt = $this->prepared_query($this->con,$sql,[7]);
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return json_encode($result);
    }

    public function add_product($type,$name,$number,$description,$price,$discount,$imagename){
        $sql = "INSERT INTO products(type, name, number, description, price, discount, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->prepared_query($this->con, $sql, [$type, $name,$number, $description, $price, $discount,$imagename]);
        if($stmt->affected_rows>0) return true;
        return false;
    }
    public function update_product($type,$name,$number,$description,$price,$discount,$imagename, $id){
        $result=false;
        if($imagename){
            $res = $this->update_image($imagename,$id);
            if(!$res) return false;
            $result=true;
        }  
        $sql = "UPDATE products SET type=?, name=?, number=?, description=?, price=?, discount=? WHERE id=?";
        $stmt = $this->prepared_query($this->con, $sql, [$type, $name,$number, $description, $price, $discount,$id]);
        if($stmt->affected_rows>0) $result = true;
        return $result;
    }

    private function update_image($imagename, $id){
        $sql = "UPDATE products SET image=? WHERE id=?";
        $stmt = $this->prepared_query($this->con, $sql,[$imagename,$id]);
        if($stmt->affected_rows>0) return true;
        return false;
    }

    public function delete_product($id){
        $sql = "UPDATE products SET is_deleted = 1 WHERE id=?";
        $stmt = $this->prepared_query($this->con,$sql,[$id]);
        if($stmt->affected_rows>0) return true;
        return false;
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