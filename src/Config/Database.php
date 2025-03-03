<?php

namespace Config;

class Database
{
    private static $host = 'db';
    private static $dbname = 'app_db';
    private static $user = 'user';
    private static $password = 'user_password';

    public static function getConnection()
    {
        try {
            $pdo = new \PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            echo "Connection error: " . $e->getMessage();
            exit;
        }
    }
} 