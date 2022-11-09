<?php

declare(strict_types=1);

namespace Auth\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Index implements ControllerInterface
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
        $template = $twig->load('main.twig');
        if (isset($_SESSION['userName'])) {
            echo $template->render(['template' => 'mainActiveUser.twig', 'name' => $_SESSION['userName']]);
        } else {
            echo $template->render(['template' => 'mainIndex.twig']);
        }
//            echo $template->render(['template' => 'mainIndex.twig']);
    }
}