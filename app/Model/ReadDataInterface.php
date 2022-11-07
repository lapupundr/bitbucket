<?php

declare(strict_types=1);

namespace Auth\Model;

interface ReadDataInterface
{
    /**
     * Return data array from json file
     *
     * @param string $path
     * @return string[]
     */
    public function execute(string $path): array;
}