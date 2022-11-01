<?php

declare(strict_types=1);

namespace Auth;

class Registration implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        echo ('Registration');

    }
}