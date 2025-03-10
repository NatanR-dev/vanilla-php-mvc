<?php

namespace Utils;

class SessionAuth
{
    public static function startSession()
    {
        ob_start();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function isAuthenticated()
    {
        self::startSession(); 
        return isset($_SESSION['user_id']);
    }

    public static function checkRole($role)
    {
        self::startSession(); 
        return self::isAuthenticated() && isset($_SESSION['user_role']) && $_SESSION['user_role'] === $role;
    }
}