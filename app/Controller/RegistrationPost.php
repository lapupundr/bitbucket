<?php

namespace Auth\Controller;

use Auth\Model\ReadData;
use Auth\Model\UpdateData;

class RegistrationPost implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'
            && isset($_POST["login"])
            && isset($_POST["pass"])
        ) {
            $userId = $_SESSION['userId'];
            $userArr = new ReadData();
            $userArr = $userArr->execute('app/db/user.json');
            if (isset($userArr[$userId])) {
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
                //                $updateData = new UpdateData();
                //                $updateData->execute('app/db/user.json', $userArr);
                $result = json_encode($result);
            }
            header('Content-Type: application/json');
            $updateData = new UpdateData();
            $updateData->execute('app/db/user.json', $userArr);
            $_SESSION['userName'] = $userArr[$userId]['name'];
            echo $result;
        } else {
            header("Location: /");
        }
    }
}