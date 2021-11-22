<?php
class CartModel extends DB {
    public function view_cart($user_id){
        $sql = "SELECT cart.id as id, products.name as product, cart.id_product as product_id, products.type as product_type, cart.number as number,products.price as money_per_unit, products.discount as discount, products.image as image
        FROM cart JOIN products ON cart.id_product=products.id 
        WHERE cart.id_user = ?";
        $stmt = $this->prepared_query($this->con, $sql,[$user_id]);
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return json_encode($result);
    }

    public function add_to_cart($product_id, $user_id, $number){
        $sql = "INSERT INTO cart(id_product, id_user, number) VALUES (?, ?, ?)";
        $stmt = $this->prepared_query($this->con, $sql, [$product_id, $user_id, $number],"iii");
        if($stmt->affected_rows>0) return true;
        return false;
    }

    public function update_item($id,$number){
        $sql = "UPDATE cart SET number=? WHERE id=?";
        $stmt = $this->prepared_query($this->con, $sql, [$number,$id]);
        if($stmt->affected_rows>0) return true;
        return false;
    }

    public function delete_item($item_id){
        $sql = "DELETE FROM cart WHERE id=?";
        $stmt = $this->prepared_query($this->con,$sql,[$item_id]);
        if($stmt->affected_rows>0) return true;
        return false;
    }


}
?>