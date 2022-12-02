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
        if (isset($userArr[$userId]) && $userArr[$userId]['login'] === $_POST['login']) {
            $result = '{"name":"you need authorization", "hidden":"false"}';
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

                $userId = $this->randomId($userId, $userArr);
                $userArr[$userId] = $result;
                $result = json_encode($result);

                $_SESSION['userName'] = $userArr[$userId]['name'];
                Connection::updateOperation($userArr);
                Connection::writeFile();
            }
        }
        return $result;
    }

    /**
     * To prevent collision decided to call this function recursively.
     *
     * @param string $userId
     * @param string[] $userArr
     * @return string
     */
    private function randomId(string $userId, array $userArr): string
    {
        if (array_key_exists($userId, $userArr)) {
            $userId = $userId . mt_rand(1000, 100000);
            $_SESSION['userId'] = $userId;
            $_COOKIE['PHPSESSID'] = $userId;
            $this->randomId($userId, $userArr);
        }
        return $userId;
    }
}