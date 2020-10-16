<?php

namespace Core;
use PDO;
use App\Config;

Abstract class Model {

    public static function getDB()
    {
        static $db = null;
        if($db === null){
            try {
                $dns = 'mysql:host='.Config::HOST.';dbname='.Config::DB;
                $db = new PDO($dns, Config::USER, Config::PASS);
                return $db;
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
