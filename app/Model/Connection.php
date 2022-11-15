<?php

declare(strict_types=1);

namespace Auth\Model;

class Connection implements ConnectionInterface
{
    /**
     * @var array
     */
    private static array $databaseArray = [];

    /**
     * @inheritDoc
     */
    public static function readFile(): void
    {
        $jsonData = file_get_contents(self::FILE_PATH);
        if (!$jsonData) {
            return;
        }
        self::$databaseArray = json_decode($jsonData, true);
    }

    /**
     * @inheritDoc
     */
    public static function writeFile(): void
    {
        $fileHandler = fopen(self::FILE_PATH, 'w+');
        fwrite($fileHandler, json_encode(self::$databaseArray));
        fclose($fileHandler);
    }

    /**
     * @inheritDoc
     */
    public static function readOperation(): array
    {
        return self::$databaseArray;
    }

    /**
     * @inheritDoc
     */
    public static function updateOperation(array $value): array
    {
        return self::$databaseArray = $value;
    }
}