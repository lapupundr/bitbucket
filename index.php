<?php

declare(strict_types=1);

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$router = new Auth\Router\Router();
$router->match();

