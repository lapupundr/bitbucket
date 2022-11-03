<?php

declare(strict_types=1);

namespace Auth\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Authorization implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $loader = new FilesystemLoader('templates');
        $twig = new Environment(
            $loader
        );
        echo $twig->render('mainAuth.twig');
    }
}