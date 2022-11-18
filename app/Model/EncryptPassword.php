<?php

declare(strict_types=1);

namespace Auth\Model;

class EncryptPassword implements EncryptPasswordInterface
{
    /**
     * @inheritDoc
     */
    public function execute(string $password): string
    {
        $staticSalt = 'TestSalt';
        return md5($password . $staticSalt);
    }
}