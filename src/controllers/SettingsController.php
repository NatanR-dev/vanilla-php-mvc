<?php
namespace Controllers;

use Models\UserModel;
use Utils\RenderView;
use Middleware\RoleMiddleware;
use Utils\SessionAuth;

class SettingsController extends RenderView
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->checkAuthentication();
    }

    private function checkAuthentication()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
    }

    public function index()
    {
        SessionAuth::startSession(); 

        if (!SessionAuth::isAuthenticated()) {
            header('Location: /auth/login'); 
            exit();
        }

        $userId = $_SESSION['user_id']; 
        $user = $this->userModel->getById($userId); 

        $this->render('admin/users/settings/user/index', ['user' => $user]);
    }

    public function edit($id)
    {
        $roleMiddleware = new RoleMiddleware();
        $roleMiddleware->checkEditPermission($id); 

        $user = $this->userModel->getById($id); 

        $this->render('admin/users/settings/user/edit', ['user' => $user]);
    }

    public function update($id)
    {
        header("Location: /admin/users/update/$id");
        exit();
    }
}