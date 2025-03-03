<?php 

require_once __DIR__ . '/src/Config/Autoloader.php';

use Core\Core; 
use Config\Autoloader;
use Router\Routes; 

Autoloader::register();

$routes = Routes::getRoutes(); 

$core = new Core();
$core->run($routes);