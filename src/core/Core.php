<?php

Class Core 
{
    public function run($routes)
    {
        $url = '/';

        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        ($url != '/') ? $url = rtrim($url, '/') : $url; // Strip whitespace (or other characters) from the end of a string.

        $routerFound = false;

        foreach($routes as $path => $controller){
            $pattern = '#^'.preg_replace('/{id}/', '([\w+])', $path).'$#'; // Perform a regular expression search and replace

            if(preg_match($pattern, $url, $matches)){
                array_shift($matches);

                $routerFound = true;
                
                [$currentController, $action] = explode('@', $controller);

                require_once __DIR__."/../controllers/$currentController.php";
                
                $newController = new $currentController();
                $newController->$action(...$matches); 
            }
        }

        if(!$routerFound) {
            require_once __DIR__."/../controllers/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->index();
        }

    }
}