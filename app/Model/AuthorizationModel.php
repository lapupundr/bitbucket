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
            if (in_array($_POST['login'], $value)) {
                $userId = $key;
                if ($userId != $_COOKIE['PHPSESSID']){
                    $_COOKIE['PHPSESSID'] = $userId;
                    $_SESSION['userId'] = $userId;
                }
                header('Content-Type: application/json');
                $_SESSION['userName'] = $userArr[$userId]['name'];
                Connection::updateOperation($userArr);
                $result = json_encode($value);
                break;
            } else {
                $result = '{"name":"you need registration", "hidden":"false"}';
            }
        }
        return $result;
    }
}