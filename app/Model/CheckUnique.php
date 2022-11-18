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
        $dataArray = Connection::readOperation();
        if (empty($dataArray)) {
            return true;
        }
        foreach ($dataArray as $array) {
            if ($value === $array[$key]) {
                return false;
            }
        }
        return true;
    }
}