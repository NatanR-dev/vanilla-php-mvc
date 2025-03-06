<?php

namespace Utils;

class SessionAuth
{
    public static function isAuthenticated()
    {
        return isset($_SESSION['user_id']);
    }

    public static function checkRole($role)
    {
        return self::isAuthenticated() && isset($_SESSION['user_role']) && $_SESSION['user_role'] === $role;
    }
}