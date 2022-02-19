<?php

class Controller
{
    function __construct(){

    }
    public function model($model){
        require_once APP. "model/".$model.".php";
        return new $model;
    }

    public function render($view_path,$variables=[]){
        extract($variables);
        ob_start();
        require_once "$view_path";
        $render_view = ob_get_clean();
        return $render_view;
    }
    static function setError($name, $value)
    {
        $_SESSION['error'][$name] = $value;
    }
}

