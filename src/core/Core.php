<?php

namespace Core;

use Controllers\NotFoundController;

class Core 
{
    public function run($routes)
    {
        $url = '/';

        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        ($url != '/') ? $url = rtrim($url, '/') : $url; // Strip whitespace (or other characters) from the end of a string.

        $routerFound = false;

        foreach ($routes as $path => $controller) {
            
            $idPattern = preg_replace('/{id}/', '(\d+)', $path); // IDs

            $slugPattern = preg_replace('/{slug}/', '([\w\-]+)', $path); // Slugs (alphanumeric with hyphens)

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
                array_shift($matches); // ($matches[0])

                $routerFound = true;

                [$currentController, $action] = explode('@', $controller);

                $controllerClass = "Controllers\\$currentController";

                $newController = new $controllerClass();
                $newController->$action(...$matches); 
                break; 
            }
        }

        if (!$routerFound) {
            $notFoundcontroller = new NotFoundController();
            $notFoundcontroller->index(); 
        }
    }
}