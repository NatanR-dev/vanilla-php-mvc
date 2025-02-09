<?php
namespace Controllers;

use Utils\RenderView;

use Models\UserModel;

class UserController extends RenderView
{
    public function index(){
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        $this->render('users/index', ['users' => $users]);
    }

    public function show($id)
    {
        $id_user = $id[0];
        $userModel = new UserModel();
        $user = $userModel->getById($id_user);

        $this->render('users/show', ['user' => $user]);
    }
}