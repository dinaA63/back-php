<?php
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

if ('' ==$_GET['cl']) {
    $object = new App\Controller\User();
    $object-> applicat();
} else {
    $className = "App\\Controller\\".$_GET['cl'];
     $object = new $className;

    if (!isset($_GET['fun'])) {
        $fun = 'applicat';
    } else {
        $fun = $_GET['fun'];
    }

    $object->{$fun}();
}