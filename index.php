<?php 

require_once __DIR__.'/src/core/core.php';
require_once __DIR__.'/src/router/routes.php';

$core = new Core();
$core->run($routes);