<?php

declare(strict_types=1);

namespace Auth\Controller;

interface JsonResultInterface
{
    /**
     * This controller return json
     *
     * @return void
     */

    public function execute(): void;

}