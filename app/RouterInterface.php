<?php

declare(strict_types=1);

namespace Auth;

interface RouterInterface
{
    /**
     * Identify which controller to use
     * Matching browser request URLs with our controllers
     *
     * @return void
     */
    public function math(): void;

}