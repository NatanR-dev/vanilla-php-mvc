<?php

namespace Middleware;

use Utils\SessionAuth as UserSessionAuth;

class RoleMiddleware
{
    public static function handle()
    {
        // var_dump($_SESSION); 
        if (!UserSessionAuth::checkRole('admin')) {
            http_response_code(403); 
            echo "<strong>ACCESS DENIED=></strong><em><sup>You don't have permission to access this page.</sup></em>";
            exit; 
        }
    }
}