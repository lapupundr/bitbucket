<?php

declare(strict_types=1);

namespace Auth;

class Router implements RouterInterface
{
    /**
     * @inheritDoc
     */
    public function math(): void
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $className = str_replace('/', '', $requestUri);
        $className = ucfirst($className);
        $className = sprintf('\Auth\%s', (strlen($className) === 0) ? 'Index' : $className);
        $controller = new $className();
        $controller->execute();
    }
}