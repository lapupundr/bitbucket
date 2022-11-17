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
            $result = json_encode($userArr[$userId]);
        } else {
            $result = [
                'login'        => $_POST["login"],
                'password'         => $_POST["password"],
                'pass_confirm' => $_POST['pass_confirm'],
                'mail'         => $_POST['mail'],
                'name'         => $_POST['name'],
            ];
            $resultCheck = new Validate();
            $resultCheck = $resultCheck->execute($result);
            $userArr[$userId] = $result;
            $result = json_encode($result);
        }
        header('Content-Type: application/json');
        if ($resultCheck) {
            $result = json_encode($resultCheck);
        } else {
            $_SESSION['userName'] = $userArr[$userId]['name'];
            Connection::updateOperation($userArr);
        }
        return $result;
    }
}