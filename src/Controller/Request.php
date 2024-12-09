<?php

namespace App\Controller;

use App\Database;

class Request
{
    public function index(){
        return Database::getAll('request');
    }

}