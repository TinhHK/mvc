<?php

namespace App\Models;

use PDO;

class Post extends \Core\Model{

    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
}