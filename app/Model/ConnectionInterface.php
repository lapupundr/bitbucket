<?php

declare(strict_types=1);

namespace Auth\Model;

interface ConnectionInterface
{
    public const  FILE_PATH = 'app/db/user.json';

    /**
     * Read file and decode json from file. Save in array
     *
     * @return void
     */
    public static function readFile(): void;

    /**
     * Encode array and rewrite json to the file.
     *
     * @return void
     */
    public static function writeFile(): void;

    /**
     * Return array from file.
     *
     * @return array
     */
    public static function readOperation(): array;

    /**
     * Update array with $value
     *
     * @param array $value
     * @return array
     */
    public static function updateOperation(array $value): array;
}