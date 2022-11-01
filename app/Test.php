<?php

declare(strict_types=1);

namespace Auth;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Test
{
    public function execute(): void
    {
        echo('TEST');
        $loader = new FilesystemLoader('templates');
        $twig = new Environment(
            $loader
        );
        echo $twig->render('mainAuth.twig');

    }
}

