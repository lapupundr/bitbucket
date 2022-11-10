<?php

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