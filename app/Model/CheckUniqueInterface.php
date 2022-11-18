<?php

declare(strict_types=1);

namespace Auth\Model;

interface CheckUniqueInterface
{
    /**
     * Compare data with data[key] in the database and return true if data unique else return false.
     *
     * @param string $value
     * @param string $key
     * @return bool
     */
    public function execute(string $value, string $key): bool;
}