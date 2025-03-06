<?php
namespace Controllers;

use Models\UserModel;
use Utils\RenderView;
use Middleware\RoleMiddleware;

class UserController extends RenderView
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
        RoleMiddleware::handle();
        
        $users = $this->userModel->getAllUsers();
        $this->render('users/index', ['users' => $users]);
    }

    public function create()
    {
        $this->render('users/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->userModel->createUser(
                $_POST['username'],
                $_POST['email'],
                $_POST['password'],
                $_POST['role'],
                $_POST['full_name'],
                $_POST['birthday']
            );
            header('Location: /users');
            exit;
        }
    }

    public function edit($id)
    {
        $user = $this->userModel->getUserById($id);
        $this->render('users/edit', ['user' => $user]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->userModel->updateUser(
                $id,
                $_POST['full_name'],
                $_POST['email'],
                $_POST['role'],
                $_POST['birthday']
            );
            header('Location: /users');
            exit;
        }
    }

    public function delete($id)
    {
        $this->userModel->deleteUser($id);
        header('Location: /users');
        exit;
    }

    public function show($id)
    {
        RoleMiddleware::handle();

        $id_user = $id[0];
        $userModel = new UserModel();
        $user = $userModel->getById($id_user);

        $this->render('users/show', ['user' => $user]);
    }
}