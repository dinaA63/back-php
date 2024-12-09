<?php
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

use App\Database;

$db = Database::getInstance();
$item = (new Database())->getAll();
var_dump($item);