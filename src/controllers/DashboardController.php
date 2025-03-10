<?php

namespace Controllers;

use Utils\RenderView;

class DashboardController extends RenderView
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login'); 
            exit;
        }

        $this->render('admin/dashboard'); 
    }
} 