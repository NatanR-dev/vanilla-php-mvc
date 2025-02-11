<?php

namespace Controllers;

use Utils\RenderView;
use Models\HomeModel;

class HomeController extends RenderView
{
    public function index()
    {
        $homeModel = new HomeModel();
        $data = $homeModel->getHomeData();
        
        $this->render('home/index', $data);
    }
}
