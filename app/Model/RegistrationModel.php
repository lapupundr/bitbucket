<?php

declare(strict_types=1);

namespace Auth\Model;

class RegistrationModel implements ModelInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): string
    {
        $userId = $_SESSION['userId'];
        $userArr = Connection::readOperation();
        if (isset($userArr[$userId]) && $userArr[$userId]['login'] === $_POST['login']
//        || $userId === $_COOKIE['PHPSESSID']
        ) {
            //            $_SERVER['REQUEST_URI'] = '/authorization';
            //            $result = json_encode($userArr[$userId]);
            $result = '{"name":"you need authorization", "hidden":"false"}';
//            $result = '{"name":"login or password is incorrect", "hidden":"false"}';
//            $result = json_encode($result);
        } else {
            $result = [
                'login'        => $_POST["login"],
                'password'     => $_POST["password"],
                'pass_confirm' => $_POST['pass_confirm'],
                'mail'         => $_POST['mail'],
                'name'         => $_POST['name'],
            ];

            $resultCheck = new Validate();
            $resultCheck = $resultCheck->execute($result);
            //            $pass = $result['password'];
            //            $encryptPass = new EncryptPassword();
            //            $encryptPass = $encryptPass->execute($pass);
            //            $userArr[$userId] = $result;
            //            $result = json_encode($result);

            header('Content-Type: application/json');
            if ($resultCheck) {
                $resultCheck['error'] = 'error';
                $result = json_encode($resultCheck);
            } else {
                $pass = $result['password'];
                $encryptPass = new EncryptPassword();
                $encryptPass = $encryptPass->execute($pass);
                $result['password'] = $encryptPass;
                $result['pass_confirm'] = $encryptPass;
                $userArr[$userId] = $result;
                $result = json_encode($result);

                $_SESSION['userName'] = $userArr[$userId]['name'];
                Connection::updateOperation($userArr);
            }
        }
        return $result;
    }
}