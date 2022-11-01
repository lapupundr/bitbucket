<?php

namespace Auth;

class Index implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        echo ('index');
    }
}