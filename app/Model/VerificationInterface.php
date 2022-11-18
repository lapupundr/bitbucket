<?php

declare(strict_types=1);

namespace Auth\Model;

interface VerificationInterface
{
    /**
     * Get user array and compare it with input data.
     * Return true if it corrects else false.
     *
     * @param array $array
     * @return bool
     */
    public function execute(array $array): bool;
}