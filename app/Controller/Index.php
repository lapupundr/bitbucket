<?php

declare(strict_types=1);

namespace Auth\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Index implements PageResultInterface
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