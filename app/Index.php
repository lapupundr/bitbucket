<?php

declare(strict_types=1);

namespace Auth;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Index implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        echo('index');
        $loader = new FilesystemLoader('templates');
        $twig = new Environment(
            $loader
        );
        echo $twig->render('mainIndex.twig');
    }
}