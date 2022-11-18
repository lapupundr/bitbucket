<?php

declare(strict_types=1);

namespace Auth\Model;

class CheckUnique implements CheckUniqueInterface
{
    /**
     * @inheritDoc
     */
    public function execute(string $value, string $key): bool
    {
        $result = true;
        $dataArray = Connection::readOperation();
        foreach ($dataArray as $array) {
            if ($value === $array[$key]) {
                $result = true;
                break;
            } else {
                $result =  false;
            }
        }
        return $result;
    }
}