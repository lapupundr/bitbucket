<?php

declare(strict_types=1);

session_start();

require_once __DIR__ . '/vendor/autoload.php';

//$_COOKIE['PHPSESSID'] = 'bms1joehvd8rudcoasqmp00dvl';
$_SESSION['userId'] = $_COOKIE['PHPSESSID'];
$router = new Auth\Router\Router();
$router->match();

