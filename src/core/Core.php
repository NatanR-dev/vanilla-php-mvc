<?php

namespace Core;

use Utils\SlashUrl; 
use Controllers\NotFoundController;

class Core
{
    public function run($routes)
    {
        $url = SlashUrl::normalizeUrl(); 

        // var_dump($url); URL normalized

        $routerFound = false;

        foreach ($routes as $path => $controller) {

            $idPattern = preg_replace('/{id}/', '(\d+)', $path); // IDs
         
            $slugPattern = preg_replace('/{slug}/', '([\w\-]+)', $path); // Slugs (alphanumeric with hyphens)

            if ($url === rtrim($path, '/')) {
                // separates the controller and the method
                [$currentController, $action] = explode('@', $controller);
                $controllerClass = "Controllers\\$currentController";
                $newController = new $controllerClass();
                $newController->$action(); 
                $routerFound = true;
                break;
            }

            // ID pattern
            if (preg_match('#^' . $idPattern . '$#', $url, $matches)) {
                array_shift($matches); // Removes the full match ($matches[0])

                $routerFound = true;

                [$currentController, $action] = explode('@', $controller);
                $controllerClass = "Controllers\\$currentController";
                $newController = new $controllerClass();
                $newController->$action(...$matches); 
                break; 
            }

            // Slug pattern
            if (preg_match('#^' . $slugPattern . '$#', $url, $matches)) {
                array_shift($matches); 

                $routerFound = true;

                [$currentController, $action] = explode('@', $controller);
                $controllerClass = "Controllers\\$currentController";
                $newController = new $controllerClass();
                $newController->$action(...$matches); 
                break; 
            }
        }

        if (!$routerFound) {
            $notFoundController = new NotFoundController();
            $notFoundController->index(); 
        }
    }
}