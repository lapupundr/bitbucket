<?php

declare(strict_types=1);

namespace Auth\Model;

class Connection implements ConnectionInterface
{
    private static array $databaseArray = [];

    public static function readFile(): void
    {
        $jsonData = file_get_contents(self::FILE_PATH);
        if (!$jsonData) {
            return;
        }
        self::$databaseArray = json_decode($jsonData, true);
        //        if ($error = json_last_error_msg()) {
        //            throw new FileFormatException('The data is wrong' . $error);
        //        }

    }

    public static function writeFile(): void
    {
        $fileHandler = fopen(self::FILE_PATH, 'w+');
        fwrite($fileHandler, json_encode(self::$databaseArray));
        fclose($fileHandler);
    }

    public static function readOperation()
    {
        return self::$databaseArray;
    }

    public static function updateOperation($value){
        return self::$databaseArray = $value;
    }
}