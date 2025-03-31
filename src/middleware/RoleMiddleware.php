<?php

namespace Middleware;

use Utils\SessionAuth as UserSessionAuth;
use Utils\SessionAuth;
use Controllers\AuthController;

class RoleMiddleware
{
    public static function handle()
    {
        SessionAuth::startSession();

        if (!UserSessionAuth::checkRole('admin')) {
            http_response_code(403); 
            echo "<strong>ACCESS DENIED=></strong><em><sup>You don't have permission to access this page.</sup></em>";
            exit; 
        }
    }

    public function checkEditPermission($userIdToEdit)
    {
        SessionAuth::startSession(); 

        AuthController::checkAuthentication(); 

        $loggedUserId = $_SESSION['user_id']; 
        $userRole = $_SESSION['user_role']; 

        if ($loggedUserId != $userIdToEdit && $userRole !== 'admin') {
            header('Location: /admin/settings/user'); 
            exit();
        }
    }
}