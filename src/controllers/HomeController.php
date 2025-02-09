<?php

namespace Controllers;

use Utils\RenderView;

use Models\UserModel;


class HomeController extends RenderView
{
    public function index()
    {
        $users = new UserModel();

        $this->render('home', [
            'title' => 'Home Page',
            'users' => $users->getAllUsers()
        ]);
    }
}
