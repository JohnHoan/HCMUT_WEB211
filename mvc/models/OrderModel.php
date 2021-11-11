<?php
class OrderModel extends DB{

    public function count_orders_today(){
        $sql = "SELECT count(create_time) FROM orders WHERE DATE(create_time) = curdate();";
        $row = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($row);
        return json_encode($row);
    }
    public function count_income_today(){
        $sql = "SELECT sum(money) FROM orders WHERE DATE(create_time) = curdate() AND is_paid=1;";
        $row = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($row);
        return json_encode($row);
    }
    public function orders_weekly(){
        $sql = "SELECT count(orders.id)as num, DATE(orders.create_time) FROM orders WHERE curdate()-DATE(orders.create_time)<=7 GROUP BY DATE(orders.create_time);";
        $rows = mysqli_query($this->con, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return json_encode($arr);
    }

    public function get_all_orders(){
        $sql = "SELECT orders.id as id, products.name as product, users.name as user, orders.number as number,orders.money as money, orders.is_paid as is_paid, orders.note as note
        FROM orders JOIN products ON orders.id_product=products.id 
        JOIN users ON orders.id_user=users.id;";
        $rows = mysqli_query($this->con, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return json_encode($arr);
    }
    public function update_order($id){
        $sql = "UPDATE orders SET is_paid=1 WHERE id=$id;";
        $result = false;
        if(mysqli_query($this->con,$sql)){
            $result=true;
        }
        return json_encode($result);
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