<?php

declare(strict_types=1);

namespace Auth\Model;

class Verification implements VerificationInterface
{
    /**
     * @inheritDoc
     */
    public function execute(array $array): bool
    {
        $encryptPass = new EncryptPassword();
        $encryptPass = $encryptPass->execute($_POST['password']);
        if ($_POST['login'] === $array['login'] && $encryptPass === $array['password']) {
            return true;
        } else return false;
    }
}