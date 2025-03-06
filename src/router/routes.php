<?php

namespace Router;

use Controllers\UserController;
use Controllers\PostController;

// Defina suas rotas aqui
class Routes
{
    public static function getRoutes()
    {
        return [
            '/' => 'HomeController@index',

            '/users' => 'UserController@index',
            '/users/{id}' => 'UserController@show',
            '/users/create' => 'UserController@create',
            '/users/store' => 'UserController@store',
            '/users/edit/{id}' => 'UserController@edit',
            '/users/update/{id}' => 'UserController@update',
            '/users/delete/{id}' => 'UserController@delete',

            '/posts' => 'PostController@index',
            '/posts/create' => 'PostController@create', 
            '/posts/store' => 'PostController@store',
            '/posts/edit/{id}' => 'PostController@edit',
            '/posts/update/{id}' => 'PostController@update',
            '/posts/delete/{id}' => 'PostController@delete',
            '/posts/{id}' => 'PostController@showById', 
            '/posts/{slug}' => 'PostController@showBySlug', 

            '/login' => 'AuthController@login',
            '/auth/authenticate' => 'AuthController@authenticate',
            '/auth/logout' => 'AuthController@logout',
            '/dashboard' => 'DashboardController@index',
        ];
    }
}