<?php

declare(strict_types=1);

namespace Auth\Router;

interface PreProcessorInterface
{
    /**
     * Checks if the user is already logged in
     *
     * @return void
     */
    public function execute(): void;
}