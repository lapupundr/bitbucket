<?php

declare(strict_types=1);

session_start();

require_once __DIR__ . '/vendor/autoload.php';

//$_COOKIE['PHPSESSID'] = 'vcv4l2lceogn1b1rb9i45nj5s8';
$_SESSION['userId'] = $_COOKIE['PHPSESSID'];

$router = new Auth\Router\Router();
$router->match();

