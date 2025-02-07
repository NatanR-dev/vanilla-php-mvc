<?php 

namespace Router;

class Routes
{
    public static function getRoutes()
    {
        return [
            '/' => 'HomeController@index',
            '/users' => 'UserController@Index',
            '/users/{id}' => 'UserController@Show'
        ];
    }
}