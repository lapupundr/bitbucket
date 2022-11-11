<?php

declare(strict_types=1);

namespace Auth\Model;

interface ModelInterface
{
    /**
     * Receives data, processes it and returns the result in json.
     *
     * @return string
     */
    public function execute(): string;
}