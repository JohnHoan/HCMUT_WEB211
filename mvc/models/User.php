<?php
class User extends DB{

    public function getUserById($user_id){
        $sql = "SELECT * FROM users WHERE id='$user_id' and is_deleted=0 LIMIT 1;";
        $row = mysqli_query($this->con, $sql);
        $arr = array();
        $arr = mysqli_fetch_array($row);
        return json_encode($arr);
    }
    public function getUsers(){
        $sql = "SELECT * FROM users";
        $rows = mysqli_query($this->con, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return json_encode($arr);
    }

    public function checkUser($username,$password)
    {
        $sql = "SELECT * FROM users WHERE username='$username' and is_deleted=0 LIMIT 1;";
        $result = false;
        $row = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($row);
        if(!$row) return $result;
        if($username==$row['username']){
            if(password_verify($password,$row['password'])){
                $result = $row;
            }
        }
        return $result;
    }

    public function addUser($username, $password, $name, $email, $address){
        $sql = "INSERT INTO users(username, password, name, email, address, roles) VALUES ('$username', '$password','$name', '$email', '$address', 0);";
        
        $result = false;
        if(mysqli_query($this->con,$sql)){
            $result=true;
        }
        return json_encode($result);
    }
}
?>