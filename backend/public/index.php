<?php

declare (strict_types=1);

use DIContainer\Container;

require __DIR__ . '/../autoloader.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$uri = $_SERVER['REQUEST_URI'];


$routing = new Routing();