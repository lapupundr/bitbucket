<?php

declare(strict_types=1);

namespace Auth;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Registration implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        echo('Registration');
        $loader = new FilesystemLoader('templates');
        $twig = new Environment(
            $loader
        );
        echo $twig->render('mainReg.twig');

    }
}