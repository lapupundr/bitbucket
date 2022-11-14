<?php

declare(strict_types=1);

use Auth\Model\Connection;

session_start();

require_once __DIR__ . '/vendor/autoload.php';

Connection::readFile();

//$_COOKIE['PHPSESSID'] = 'vcv4l2lceogn1b1rb9i45nj5s8';
$_SESSION['userId'] = $_COOKIE['PHPSESSID'];

$preProcessor = new \Auth\Router\PreProcessor();
$preProcessor->execute();

$router = new \Auth\Router\Router();
$router->match();

Connection::writeFile();

