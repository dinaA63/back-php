<?php
ini_set('display_errors', 'On');
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

if ('' ==$_GET['cl']) {
    $object = new App\Controller\User();
    $object-> index();
} else {
    $className = "App\\Controller\\".$_GET['cl'];
     $object = new $className;

   
     
    if (!isset($_GET['fun'])) {
        $fun = 'index';
    } else {
        $fun = $_GET['fun'];
    }

    unset($_GET['fun']);
    unset($_GET['cl']);
 
    if(empty($_GET)){
        $object->{$fun}();
    } else {
        $object->{$fun}($_GET);
    }
    
}