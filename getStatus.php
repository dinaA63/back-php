<?php
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

use App\Controller\User;
$user = Database::getStatus(2,'user', 'status');

var_dump($user);

