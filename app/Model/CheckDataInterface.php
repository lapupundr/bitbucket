<?php

declare(strict_types=1);

namespace Auth\Model;

interface CheckDataInterface
{
    /**
     * Checking if data already exist in the json file.
     *
     * @param string $path
     * @param string $data
     * @return bool
     */
    public function execute(string $path, string $data): bool;
}