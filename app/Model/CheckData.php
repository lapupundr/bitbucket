<?php

declare(strict_types=1);

namespace Auth\Model;

class CheckData implements CheckDataInterface
{
    /**
     * @inheritDoc
     */
    public function execute(string $path, string $data): bool
    {
        $json = file_get_contents($path);
        $userArr = json_decode($json);

        $a = '1';
        return true;

    }
}