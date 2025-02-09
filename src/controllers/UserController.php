<?php
namespace Controllers;

use Utils\RenderView;

use Models\UserModel;

class UserController extends RenderView
{
    public function index(){
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        $this->render('users', ['users' => $users]);
    }

    public function show($id)
    {
        $id_user = $id[0];
        $user = new UserModel;
        $this->render('users', ['user' => $user->getById($id_user)]);       
    }
}