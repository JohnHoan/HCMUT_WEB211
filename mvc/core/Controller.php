<?php
class Controller{

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }

    public function redirect($controller,$method = "index",$args = array())
    {
        global $core; 
        $location;
        if(!$args){
            $location = $core->config->base_url . "/web211/" . $controller . "/" . $method ;
        }
        else{
            $location = $core->config->base_url . "/web211/" . $controller . "/" . $method . "/" . implode("/",$args);
        }
        header("Location: " . $location);
        exit;
    }
}
?>