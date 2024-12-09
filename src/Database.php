<?php
namespace App;

use \PDO;

class Database {
    protected static $db = null;

    protected function __construct() {

    }

    static public function getInstance() {
        if (is_null(self::$db)) {
            $dsn = 'mysql:host=localhost;dbname=ganahfpu_m1;charset=utf8';
            self::$db = new PDO($dsn, 'ganahfpu', 'nKrveS');
        }
        return self::$db;
    }
    
    public static function getById($id, $table) {
        self::getInstance();
        $stmt = self::$db->prepare("Select * From ".$table." WHERE id = :i");
        $stmt->execute(['i'=>$id]);
        return $stmt->fetchAll();
    }

    // public static function getAll($table) {
    //     self::getInstance();
    //     $result = self::$db->query("SELECT * FROM ".$table."");
    //     return $result->fetchAll();
    // }

    public static function getAll() {
        self::getInstance();
        $result = self::$db->query("SELECT  application.id, 
                                            users.name, 
                                            users.number, 
                                            application.car, 
                                            application.problem, 
                                            application.date, 
                                            application.time, 
                                            application.status FROM application AS application JOIN users AS users ON application.user_id = users.id");
        return $result->fetchAll();
    }

//     public static function getAll()
// {
//     self::getInstance();
//     $user_id = $_COOKIE['user_id'] ?? null;

//     $stmt = self::$db->prepare("SELECT application.id, 
//                                         users.name, 
//                                         users.number, 
//                                         application.car, 
//                                         application.problem, 
//                                         application.date, 
//                                         application.time, 
//                                         application.status 
//                                  FROM application AS application 
//                                  JOIN users AS users ON application.user_id = users.id 
//                                  WHERE application.user_id = :user_id");
//     $stmt->execute(['user_id' => $user_id]);
//     return $stmt->fetchAll();
// }

    public static function addElement(array $fields, string $table): void
    {
        self::getInstance();
        $column = [];
        $values = [];
        foreach ($fields as $key => $value){
            $column[] = $key;
            $values[] = '"'.$value.'"';
        }

        $strColumn ='( '. implode(', ', $column). ' )';
        $strValues ='( '. implode(', ', $values). ' )';

        $sql = 'Insert Into '.$table.' '.$strColumn.' '.' Values'.$strValues;
        require_once($_SERVER['DOCUMENT_ROOT'].'/index.php');
        // echo $sql;
        self::$db->query($sql);

    }

    // public static function getAuthorize(string $login, string $password): int
    // {
    //     self::getInstance();
    //     $db = Database::getInstance();
    //     $stmt = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM users WHERE login =:login AND password =:password");
    //     $stmt->execute(['login'=>$login, 'password'=>$password]);
    //     $result = $stmt->fetchAll();

    //     return($result[0]['COUNT']);

    // }


    
    public static function getAuthorize(string $login, string $password): int
    {
        self::getInstance();
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT id FROM users WHERE login = :login AND password = :password");
        $stmt->execute(['login' => $login, 'password' => $password]);
        $result = $stmt->fetch();

        if ($result) {
            return $result['id'];
        }

        return 0;
    }
    

    public static function adminAutho(string $login, string $password): int
    {
        self::getInstance();
        $db = Database::getInstance();
        $stmt = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM admin WHERE login =:login AND password =:password");
        $stmt->execute(['login'=>$login, 'password'=>$password]);
        $result = $stmt->fetchAll();

        return($result[0]['COUNT']);

    }    

    public static function getStatus($table) {
        self::getInstance();
        $stmt = self::$db->prepare("Select * From ".$table." WHERE status = :?");
        $stmt->execute(['?'=>$status]);
        return $stmt->fetchAll();
    }

    public static function deleteElement(int $id, string $table): void
    {
        self::getInstance();
        $sql = 'Delete from '.$table.' where id = '.$id;
        self::$db->query($sql);
    }

    public static function editElement($table, $param) {
        self::getInstance();
        $db = Database::getInstance();
        $stmt = self::$db->prepare("UPDATE ".$table." SET status =:status WHERE id =:id");
        $stmt->execute(['status'=>$param['status'], 'id'=>$param['id']]);
    }
}