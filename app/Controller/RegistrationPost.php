<?php

namespace Auth\Controller;

class RegistrationPost implements JsonResultInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        if (isset($_POST["login"]) && isset($_POST["pass"])) {

            $result = array(
                'login' => $_POST["login"],
                'pass' => $_POST["pass"],
                'pass_confirm' => $_POST['pass_confirm'],
                'mail' => $_POST['mail'],
                'name' => $_POST['name']
            );

            $result = json_encode($result);
            echo $result;
//            return $result;
        }
    }
}