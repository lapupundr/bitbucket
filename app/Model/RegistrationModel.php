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
        $userArr = new ReadData();
        $userArr = $userArr->execute('app/db/user.json');
        if (isset($userArr[$userId]) && $userArr[$userId]['login'] === $_POST['login']) {
            $result = json_encode($userArr[$userId]);
        } else {
            $result = [
                'login'        => $_POST["login"],
                'pass'         => $_POST["pass"],
                'pass_confirm' => $_POST['pass_confirm'],
                'mail'         => $_POST['mail'],
                'name'         => $_POST['name'],
            ];
            $userArr[$userId] = $result;
            $result = json_encode($result);
        }
        header('Content-Type: application/json');
        $_SESSION['userName'] = $userArr[$userId]['name'];
        $updateData = new UpdateData();
        $updateData->execute('app/db/user.json', $userArr);
        return $result;
    }
}