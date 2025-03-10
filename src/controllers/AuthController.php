<?php

namespace Controllers;

use Utils\RenderView;
use Models\AuthModel;
use Utils\SessionAuth;

class AuthController extends RenderView
{
    public function login()
    {
        SessionAuth::startSession();

        if (isset($_SESSION['user_id'])) {
            header('Location: /admin/dashboard'); 
            exit;
        }

        $this->render('auth/login');
    }

    public function authenticate()
    {
        SessionAuth::startSession();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $authModel = new AuthModel();
            $user = $authModel->getUserByEmail($email); 

            if ($user && $authModel->verifyPassword($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = isset($user['role']) ? $user['role'] : 'default_role';
                $_SESSION['username'] = $user['username']; 

                header('Location: /admin/dashboard');
                exit;
            } else {
                echo "Email ou senha incorretos. Tente novamente.";
            }
        } else {
            header('Location: /login');
            exit;
        }
    }

    public function logout()
    {
        SessionAuth::startSession();
        session_destroy(); 
        header('Location: /login'); 
        exit;
    }
} 