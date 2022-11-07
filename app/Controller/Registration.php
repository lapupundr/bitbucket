<?php

declare(strict_types=1);

namespace Auth\Controller;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class Registration implements ControllerInterface
{
    /**
     * @inheritDoc
     * @throws LoaderError|RuntimeError|SyntaxError
     */
    public function execute(): void
    {
        $loader = new FilesystemLoader('templates');
        $twig = new Environment(
            $loader
        );
        echo $twig->render('mainReg.twig');
    }
}