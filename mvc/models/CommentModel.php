<?php
class CommentModel extends DB{

    public function get_all_comments(){
        $sql = "SELECT comments.id as id, products.name as product, users.name as user, comments.content as content FROM comments JOIN products ON comments.id_product=products.id JOIN users ON comments.id_user=users.id WHERE comments.is_deleted=0;";
        $rows = mysqli_query($this->con, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return json_encode($arr);
    }
    public function hide_comment($id){
        $sql = "UPDATE comments SET is_deleted=1 WHERE id=$id;";
        $result = false;
        if(mysqli_query($this->con,$sql)){
            $result=true;
        }
        return json_encode($result);
    }
    public function listen_search($input){
        $sql = "SELECT * FROM comments JOIN users ON comments.id_user=users.id JOIN products ON comments.id_product=products.id WHERE products.name LIKE '%$input%' OR users.name LIKE '%$input%' OR content LIKE '%$input%';";
        $rows = mysqli_query($this->con, $sql);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[]=$row;
        }
        return json_encode($arr);
    }
}
?>