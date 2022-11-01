<?php

declare(strict_types=1);

use Auth\Router;

require_once __DIR__ . '/vendor/autoload.php';

echo ('hi');

$router = new Router();
$router->math();

