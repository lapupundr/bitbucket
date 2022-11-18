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
        //        $result = true;
        $dataArray = Connection::readOperation();
        if (empty($dataArray)) {
            $result = true;
        }
        foreach ($dataArray as $array) {
            if ($value === $array[$key]) {
                $result = false;
                break;
            } else {
                $result = true;
            }
        }
        return $result;
    }
}