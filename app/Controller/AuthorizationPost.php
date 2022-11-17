<?php

declare(strict_types=1);

namespace Auth\Controller;

use Auth\Model\AuthorizationModel;

class AuthorizationPost implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        if (
//            isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'
            && isset($_POST["login"])
            && isset($_POST["pass"])
        ) {
            $result = new AuthorizationModel();
            $result = $result->execute();
            echo $result;
        } else {
            header("Location: /");
        }
    }
}