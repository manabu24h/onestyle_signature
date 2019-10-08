<?php


class Database {


    public static function getConnection() {
        require_once $_SERVER['DOCUMENT_ROOT']."config/db.php";
        $dsn = "mysql:dbname=".$db_conf["dbname"].";host=".$db_conf["host"].";charset=".$db_conf["charset"];
        $user_name = $db_conf["username"];
        $password = $db_conf["password"];
        try {
        $pdo = new PDO($dsn,$user_name,$password);
        } catch(PDOException $e) {
            echo $e->getMessage();exit;
        }
        return $pdo;
        //return new PDO($dsn,$user_name,$password);
    }


}
