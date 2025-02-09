<?php
namespace Models;

use \PDO;
use \PDOException;
use Models\UserModel;

class Database {
    protected function getConnection() {
        try {
            $pdo = new PDO("mysql:dbname=app_db;host=db", "user", "user_password");
            return $pdo;    
        } catch (PDOException $err) {
            echo "Connection error: " . $err->getMessage();
            exit;
        }
    }
}