<?php

namespace Auth\Controller;

class RegistrationPost implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {

            if (isset($_POST["login"]) && isset($_POST["pass"])) {

                $result = array(
                    'login' => $_POST["login"],
                    'pass' => $_POST["pass"],
                    'pass_confirm' => $_POST['pass_confirm'],
                    'mail' => $_POST['mail'],
                    'name' => $_POST['name']
                );

                $result = json_encode($result);
                header('Content-Type: application/json');
                echo $result;
            }
        } else {
            header("Location: /");
        }
    }
}