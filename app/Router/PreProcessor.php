<?php

declare(strict_types=1);

namespace Auth\Router;

class PreProcessor implements PreProcessorInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        if (isset($_SESSION['userName']) && $_SERVER['REQUEST_URI'] != '/logout') {
            $_SERVER['REQUEST_URI'] = 'index';
        }
    }
}