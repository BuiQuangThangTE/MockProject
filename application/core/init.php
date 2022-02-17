<?php
spl_autoload_register(function ($class){
    require APP . 'core/'.$class.'.php';
});
?>