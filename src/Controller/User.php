<?php

namespace App\Controller;

use App\Database;

class User
{
    public function index(){
        // return Database::getAll('user');
        require_once($_SERVER['DOCUMENT_ROOT'].'/registration.php');
    }

    public function register() {
        Database::addElement($_POST, 'users');
    }

    public function getAuthorize() {
       $result = Database::getAuthorize($_POST['login'], $_POST['password']);
        if ($result > 0) {

            setcookie('id',$result, time() + 3600); 
            require('application.php');
        // echo "вы авторизованны";
        } else {
            echo "вы не зарегестрированны";
        }
    }

    public function adminAutho() {
        $result = Database::adminAutho($_POST['login'], $_POST['password']);
        if ($result > 0) {
            // require('/User/showFormEditApplication');
            $this->showFormEditApplication();
        } else {
            echo "неправильно введен логин или пароль";
        }
    }

    public function applicat() {
        require_once($_SERVER['DOCUMENT_ROOT'].'/application.php');
    }

    public function addApplication() {
        Database::addElement($_POST, 'application');
    }

    public function getApplication() {
        $result=Database::getAll('application');
        var_dump($result);
    }
    
    public function editStatus($arEl) {
        Database::editElement('application', $arEl);
    }
    
    public function showFornRegist() {
        require_once($_SERVER['DOCUMENT_ROOT'].'/registration.php');
    }

    public function showFormLogin() {
        require_once($_SERVER['DOCUMENT_ROOT'].'/logIn.php');
    }

    public function showFormAdminLogin() {
        require_once($_SERVER['DOCUMENT_ROOT'].'/logInAdmin.php');
    }

    public function showFormIndex() {
        require_once($_SERVER['DOCUMENT_ROOT'].'/index.php');
    }

    public function showFormAddApplication() {
        require_once($_SERVER['DOCUMENT_ROOT'].'/application.php');
    }

    public function showFormEditApplication() {
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => $_SERVER['DOCUMENT_ROOT'].'/cache',
        ]);
        $result=Database::getAll();
        echo $twig->render('editApplication.html', ['result' =>$result]);
    }

    public function showFormGetApplication() {
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => $_SERVER['DOCUMENT_ROOT'].'/cache',
        ]);
        $result=Database::getAll();
        echo $twig->render('getApplication.html', ['result' =>$result]);
    }
}