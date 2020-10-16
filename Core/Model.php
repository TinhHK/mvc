<?php

namespace Core;
use PDO;

Abstract class Model {

    public static function getDB()
    {
        static $db = null;
        if($db === null){
            $host = "localhost";
            $db = "mvc";
            $user = "root";
            $pass = "mysql";
            try {
                $db = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
                return $db;
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
