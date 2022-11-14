<?php

declare(strict_types=1);

namespace Auth\Model;

interface ConnectionInterface
{
    public const  FILE_PATH = 'app/db/user.json';

    /**
     *
     * @return void
     */
    public static function readFile(): void;

    /**
     * @return void
     */
    public static function writeFile(): void;
}