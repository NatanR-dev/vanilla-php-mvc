<?php
namespace Controllers;

use Models\UserModel;
use Utils\RenderView;
use Middleware\RoleMiddleware;
use Utils\SessionAuth;

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
        $this->render('admin/users/index', ['users' => $users]);
    }

    public function create()
    {
        $this->render('admin/users/create');
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
            header('Location: /admin/users');
            exit;
        }
    }

    public function edit($id)
    {
        $user = $this->userModel->getUserById($id);
        $this->render('admin/users/edit', ['user' => $user]);
    }

    public function update($id)
    {
        SessionAuth::startSession();

        if (!SessionAuth::isAuthenticated()) {
            header('Location: /auth/login');
            exit();
        }

        $user = $this->userModel->getById($id);

        $fullName = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];

        $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

        if ($_SESSION['user_role'] === 'admin' && isset($_POST['role'])) {
            $role = $_POST['role'];
        } else {
            $role = $user['role'];
        }

        $this->userModel->updateUser($id, $fullName, $username, $email, $role, $birthday);

        header('Location: /admin/users');
        exit();
    }

    public function delete($id)
    {
        $this->userModel->deleteUser($id);
        header('Location: /admin/users');
        exit;
    }

    public function show($id)
    {
        RoleMiddleware::handle();

        $id_user = $id[0];
        $userModel = new UserModel();
        $user = $userModel->getById($id_user);

        $this->render('admin/users/show', ['user' => $user]);
    }
}