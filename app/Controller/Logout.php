<?php

declare(strict_types=1);

namespace Auth\Controller;

class Logout implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        unset($_SESSION['userName']);
        header("Location: /index");
    }
}