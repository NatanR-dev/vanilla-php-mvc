<?php 

namespace Router;

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
            '/posts/{id}' => 'PostController@showById',
            '/posts/{slug}' => 'PostController@showBySlug',

            '/login' => 'AuthController@login',
            '/auth/authenticate' => 'AuthController@authenticate',
            '/auth/logout' => 'AuthController@logout',
            '/dashboard' => 'DashboardController@index',
        ];
    }
}