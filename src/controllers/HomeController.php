<?php

namespace Controllers;

use Utils\RenderView;

class HomeController extends RenderView
{
    public function index()
    {
        $this->render('home', [
            'title' => 'Home Page',
            'body' => '&#128075;Welcome!'
            ]);
    }
}
