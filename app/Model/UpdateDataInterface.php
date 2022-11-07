<?php

declare(strict_types=1);

namespace Auth\Model;

interface UpdateDataInterface
{
    /**
     * This class open file or create an open. Add new user at the end of file.
     *
     * @param string $path
     * @param string $data
     * @return void
     */
    public function execute(string $path, string $data): void;
}