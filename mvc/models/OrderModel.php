<?php
class OrderModel extends DB{

    public function count_orders_today(){

        $sql = "SELECT count(id) FROM orders WHERE DATE(create_time) = curdate() AND ?";
        $stmt = $this->prepared_query($this->con,$sql,[1]);
        $result = $stmt->get_result()->fetch_row();
        return json_encode($result);
    }
    public function count_income_today(){

        $sql = "SELECT sum(money) FROM orders  WHERE DATE(create_time) = curdate() AND is_paid=?";
        $stmt = $this->prepared_query($this->con,$sql,[1]);
        $result = $stmt->get_result()->fetch_row();
        return json_encode($result);
    }

    public function add_to_order($note,$number,$money,$is_paid, $id_product,$id_user){
        $sql = "INSERT INTO orders(note, number, money,is_paid, id_product, id_user) VALUES (?,?,?,?,?,?)";
        $stmt = $this->prepared_query($this->con, $sql, [$note,$number,$money,$is_paid,$id_product,$id_user],"siiiii");
        if($stmt->affected_rows>0) return true;
        return false;
    }

    public function orders_weekly(){
        $sql = "SELECT count(orders.id)as num, DATE(orders.create_time) as day FROM orders WHERE curdate()-DATE(orders.create_time)<=? GROUP BY DATE(orders.create_time)";
        $stmt = $this->prepared_query($this->con, $sql,[7]);
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return json_encode($result);
    }

    public function get_all_orders(){
        $sql = "SELECT orders.id as id, products.name as product, users.name as user, orders.number as number,orders.money as money, orders.is_paid as is_paid, orders.note as note
        FROM orders JOIN products ON orders.id_product=products.id 
        JOIN users ON orders.id_user=users.id WHERE ?";
        $stmt = $this->prepared_query($this->con, $sql,[1]);
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return json_encode($result);
    }
    public function update_order($id){
        $sql = "UPDATE orders SET is_paid=1 WHERE id=?";
        $stmt = $this->prepared_query($this->con, $sql, [$id]);
        if($stmt->affected_rows>0) return true;
        return false;
    }
    public function listen_search($input){
        $sql = "SELECT * FROM orders JOIN users ON orders.id_user=users.id JOIN products ON orders.id_product=products.id WHERE products.name LIKE '%$input%' OR users.name LIKE '%$input%';";
        $rows = mysqli_query($this->con, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return json_encode($arr);
    }
}
?>