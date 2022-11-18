<?php

declare(strict_types=1);

namespace Auth\Model;

interface EncryptPasswordInterface
{
    /**
     * Encrypt user password
     *
     * @param string $password
     * @return string
     */
    public function execute(string $password): string;
}