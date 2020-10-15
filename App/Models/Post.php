<?php

namespace App\Models;

use PDO;

class Post {

    public static function getAll()
    {
        $host = "localhost";
        $db = "mvc";
        $user = "root";
        $pass = "mysql";
        try {
            $db = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
