<?php 

$routes = [
  '/' =>  'HomeController@index',
  
  '/users' => 'UserController@Index',
  '/users/{id}' => 'UserController@Show'

];