<?php
class UserModel extends DB{

    public function get_user_by_id($user_id){
        $sql = "SELECT * FROM users WHERE id='$user_id' LIMIT 1;";
        $row = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($row);
        return json_encode($row);
    }
    public function get_all_users(){
        $sql = "SELECT * FROM users ORDER BY is_deleted ASC;";
        $rows = mysqli_query($this->con, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return json_encode($arr);
    }

    public function count_active_user(){
        $sql = "SELECT count(*) FROM users WHERE is_deleted=0;";
        $row = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($row);
        return json_encode($row);
    }
    public function check_user($username,$password)
    {
        $sql = "SELECT * FROM users WHERE username='$username' and is_deleted=0 LIMIT 1;";
        
        $row = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($row);
        $result = false;
        if(!$row) return $result;
        if($username==$row['username']){
            if(password_verify($password,$row['password'])){
                $result = $row;
            }
        }
        return $result;
    }

    public function check_username($input)
    {
        $sql = "SELECT * FROM users WHERE username = '$input';";
        $rows = mysqli_query($this->con, $sql);
        $result = false;
        if(mysqli_num_rows($rows)>0){
            $result = true;
        }
        return json_encode($result);
    }

    public function add_user($username, $password, $name, $email, $address){
        $sql = "INSERT INTO users(username, password, name, email, address, roles) VALUES ('$username', '$password','$name', '$email', '$address', 0);";
        
        $result = false;
        if(mysqli_query($this->con,$sql)){
            $result=true;
        }
        return json_encode($result);
    }
    public function update_user($name, $email, $address, $role,$status, $id){
        $sql = "UPDATE users SET name='$name', email='$email', address='$address', roles=$role, is_deleted=$status WHERE id=$id;";
        $result = false;
        if(mysqli_query($this->con,$sql)){
            $result=true;
        }
        return json_encode($result);
    }

    public function delete_user($id){
        $sql = "UPDATE users SET is_deleted = 1 WHERE id=$id;";
        $result = false;
        if(mysqli_query($this->con,$sql)){
            $result=true;
        }
        return json_encode($result);
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