<?php

declare(strict_types=1);

namespace Auth\Router;

class Router implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(): void
    {
        if (isset($_SESSION['userName'])){
//            $_SERVER['REQUEST_URI'] = 'index';
        }
        $requestUri = $_SERVER['REQUEST_URI'];
        $className = str_replace('/', '', $requestUri);
        $className = ucfirst($className);
        $className = sprintf('\Auth\Controller\%s', (strlen($className) === 0) ? 'Index' : $className);
        $controller = new $className();
        $controller->execute();
    }
}