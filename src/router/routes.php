<?php

namespace Router;

use Controllers\UserController;
use Controllers\PostController;

class Routes
{
    public static function getRoutes()
    {
        return [
            '/' => 'HomeController@index',

            '/admin/users' => 'UserController@index',
            '/admin/users/{id}' => 'UserController@show',
            '/admin/users/create' => 'UserController@create',
            '/admin/users/store' => 'UserController@store',
            '/admin/users/edit/{id}' => 'UserController@edit',
            '/admin/users/update/{id}' => 'UserController@update',
            '/admin/users/delete/{id}' => 'UserController@delete',

            '/admin/settings/user' => 'SettingsController@index',
            '/admin/settings/user/edit/{id}' => 'SettingsController@edit',
            '/admin/settings/user/update/{id}' => 'SettingsController@update',

            '/posts' => 'PostController@index',
            '/posts/{id}' => 'PostController@showById',
            '/posts/{slug}' => 'PostController@showBySlug',

            '/admin/posts' => 'PostController@index',
            '/admin/posts/create' => 'PostController@create',
            '/admin/posts/store' => 'PostController@store',
            '/admin/posts/edit/{id}' => 'PostController@edit',
            '/admin/posts/update/{id}' => 'PostController@update',
            '/admin/posts/delete/{id}' => 'PostController@delete',
            '/admin/posts/{id}' => 'PostController@showById',

            '/login' => 'AuthController@login',
            '/auth/authenticate' => 'AuthController@authenticate',
            '/auth/logout' => 'AuthController@logout',
            '/admin/dashboard' => 'DashboardController@index',
        ];
    }
}