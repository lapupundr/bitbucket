<?php

namespace Auth\Controller;

use Auth\Model\ReadData;
use Auth\Model\UpdateData;

class AuthorizationPost implements ControllerInterface
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
            $userArr = new ReadData();
            $userArr = $userArr->execute('app/db/user.json');
            if (empty($userArr)) {
                $result = '{"name":"you need registration", "hidden":"false"}';
            }

            foreach ($userArr as $key => $value) {
                if (in_array($_POST['login'], $value)) {
                    $userId = $key;
                    $userIdNew = $_COOKIE['PHPSESSID'];
                    $userArr[$userIdNew] = $userArr[$userId];
                    unset($userArr[$userId]);
                    $_SESSION['userName'] = $userArr[$userIdNew]['name'];
                    $updateData = new UpdateData();
                    $updateData->execute('app/db/user.json', $userArr);
                    $result = json_encode($value);
                    break;
                } else {
                    $result = '{"name":"you need registration", "hidden":"false"}';
                }
            }
            echo $result;
        }
    }
}