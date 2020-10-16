<?php

namespace Core;
use PDO;
use App\Config;

Abstract class Model {

    public static function getDB()
    {
        static $db = null;
        if($db === null){
            $dns = 'mysql:host='.Config::HOST.';dbname='.Config::DB;
            $db = new PDO($dns, Config::USER, Config::PASS);
            // Throws an exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
    }
}
