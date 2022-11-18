<?php

declare(strict_types=1);

namespace Auth\Controller;

interface ControllerInterface
{
    /**
     * Use to check is ajax request.
     */
    const AJAX_REQUEST_FLAG = 'XMLHttpRequest';

    /**
     * This is a basic controller which render all the pages on the website.
     *
     * @return void
     */
    public function execute(): void;
}