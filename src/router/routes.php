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
                
            '/posts' => 'PostController@index',
            '/posts/{id}' => 'PostController@showById',
            '/posts/{slug}' => 'PostController@showBySlug'
        ];
    }
}