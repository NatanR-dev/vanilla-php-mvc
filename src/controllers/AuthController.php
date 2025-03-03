<?php

namespace Controllers;

use Utils\RenderView;
use Models\AuthModel;

class AuthController extends RenderView
{
    public function login()
    {
        session_start(); 

        if (isset($_SESSION['user_id'])) {
            header('Location: /dashboard'); 
            exit;
        }

        $this->render('auth/login');
    }

    public function authenticate()
    {
        session_start(); 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $authModel = new AuthModel();
            $user = $authModel->getUserByEmail($email); 

            if ($user && $authModel->verifyPassword($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = isset($user['role']) ? $user['role'] : 'default_role';
                $_SESSION['username'] = $user['username']; 

                header('Location: /dashboard');
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
        session_start();
        session_destroy(); 
        header('Location: /login'); 
        exit;
    }
} 