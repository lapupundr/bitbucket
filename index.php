<?php

declare(strict_types=1);

use Auth\Model\Connection;
use Auth\Router\Router;

session_start();

require_once __DIR__ . '/vendor/autoload.php';

Connection::readFile();

$_SESSION['userId'] = $_COOKIE['PHPSESSID'] ?? session_id();

$router = new Router();
$router->match();
