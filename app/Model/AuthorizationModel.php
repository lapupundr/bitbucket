<?php

declare(strict_types=1);

namespace Auth\Model;

class AuthorizationModel implements ModelInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): string
    {
        $userArr = Connection::readOperation();
        if (empty($userArr)) {
            $result = '{"name":"you need registration", "hidden":"false"}';
        }

        foreach ($userArr as $key => $value) {
            $verificationUser = new Verification();
            $verificationUser = $verificationUser->execute($value);
            if ($verificationUser) {
                header('Content-Type: application/json');
                $_SESSION['userName'] = $value['name'];
                $_SESSION['userId'] = $key;
                $_COOKIE['PHPSESSID'] = $key;
                $result = json_encode($value);
                break;
            } else {
                $result = '{"name":"login or password is incorrect", "hidden":"false"}';
            }
        }
        return $result;
    }
}