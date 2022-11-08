<?php

namespace Auth\Controller;

use Auth\Model\ReadData;

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

            foreach ($userArr as $key => $value) {
            if (in_array($_POST['login'], $value)){
                $userId = $key;
                $result = json_encode($value);
                break;
            } else {
                $result = '{"name":"You need registration"}';
            }
            }
                echo $result;
        }
    }
}