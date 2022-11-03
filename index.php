<?php

declare(strict_types=1);

session_start();

use Auth\Router;

require_once __DIR__ . '/vendor/autoload.php';

$router = new Router();
$router->math();

