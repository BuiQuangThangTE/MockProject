<?php
session_start();
define("ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);
define("APP", ROOT . "application" . DIRECTORY_SEPARATOR);
//echo '<pre>';
//var_dump( $_SERVER);exit;

header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');
header('Access-Control-Allow-Methods:PUT POST DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require APP . "config/config.php";
//require APP . "core/application.php";
//require APP . "core/controller.php";
//require APP . "core/Response.php";
require APP . "core/init.php";
// start the application

$app = new Application();