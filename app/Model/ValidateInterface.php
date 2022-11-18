<?php

declare(strict_types=1);

namespace Auth\Model;

interface ValidateInterface
{
    /**
     * Check data from registration form.
     *
     * @param string[] $userArr
     * @return string[]
     */
    public function execute(array $userArr): array;
}