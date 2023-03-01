<?php

require __DIR__ . '/../autoloader.php';

use Controllers\ImagePageController;
use Controllers\ManageUsersPageController;

class Routing
{
    public function __construct()
    {
        $router = new Router();

        $router->get('image', ImagePageController::class,'print');
        $router->get('manage', ManageUsersPageController::class,'print');

        $router->run();
    }

}
