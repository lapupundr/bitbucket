<?php

declare(strict_types=1);

namespace Auth\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Dashboard implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $loader = new FilesystemLoader('templates');
        $twig = new Environment($loader);
        $template = $twig->load('main.twig');
        echo $template->render(['template' => 'mainActiveUser.twig', 'name' => $_SESSION['userName']]);
    }
}