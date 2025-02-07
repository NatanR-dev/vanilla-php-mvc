<?php 

use Core\Core; 
use Router\Routes; 

//Autoload
spl_autoload_register(function ($class) {
    
    $file = __DIR__ . "/src/" . str_replace('\\', '/', $class) . ".php";

    
    if (file_exists($file)) {
        require_once $file;
    }
});


$routes = Routes::getRoutes(); 

$core = new Core();
$core->run($routes);