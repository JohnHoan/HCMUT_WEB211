<?php
class UserModel extends DB{

    public function get_user_by_id($user_id){
        $sql = "SELECT * FROM users WHERE id=? LIMIT ?";
        $stmt = $this->prepared_query($this->con, $sql,[$user_id,1]);
        $result = $stmt->get_result()->fetch_assoc();
        return json_encode($result);
    }
    public function get_all_users(){
        $sql = "SELECT * FROM users WHERE ? ORDER BY is_deleted ASC";
        $stmt = $this->prepared_query($this->con, $sql,[1]);
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return json_encode($result);
    }

    public function count_active_user(){
        $sql = "SELECT count(id) FROM users WHERE is_deleted=?";
        $stmt = $this->prepared_query($this->con, $sql,[0]);
        $result = $stmt->get_result()->fetch_row();
        return json_encode($result);
    }
    public function check_user($username,$password)
    {
        $sql = "SELECT * FROM users WHERE username=? and is_deleted=?";
        $stmt = $this->prepared_query($this->con, $sql,[$username,0]);
        $result = $stmt->get_result()->fetch_assoc();
        if(!$result) return false;
        if($username==$result['username']){
            if(password_verify($password,$result['password'])){
                return json_encode($result);
            }
        }
        return false;
    }

    public function check_username($input)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE username=?";
        $stmt = $this->prepared_query($this->con, $sql,[$input]);
        $stmt->bind_result($num_rows);
        $stmt->fetch();
        if($num_rows>0) return json_encode(true);
        return json_encode(false);
    }

    public function add_user($username, $password, $name, $email, $address){

        $sql = "INSERT INTO users(username, password, name, email, address, roles) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->prepared_query($this->con, $sql, [$username, $password,$name, $email, $address, 0],"sssssi");
        if($stmt->affected_rows>0) return true;
        return false;
    }
    public function update_user($name, $email, $address, $role,$status, $id){
        $sql = "UPDATE users SET name=?, email=?, address=?, roles=?, is_deleted=? WHERE id=?";
        $stmt = $this->prepared_query($this->con, $sql, [$name, $email, $address, $role, $status, $id],"sssiii");
        if($stmt->affected_rows>0) return true;
        return false;
    }

    public function delete_user($id){
        $sql = "UPDATE users SET is_deleted = 1 WHERE id=?";
        $stmt = $this->prepared_query($this->con,$sql,[$id]);
        if($stmt->affected_rows>0) return true;
        return false;
    }
    
    public function listen_search($input){
        $sql = "SELECT * FROM users WHERE name LIKE '%$input%' OR email LIKE '%$input%';";
        $rows = mysqli_query($this->con, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return json_encode($arr);
    }
}
?>