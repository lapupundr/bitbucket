<?php

namespace Auth\Model;

class ReadData implements ReadDataInterface
{
    /**
     * @inheritDoc
     */
    public function execute(string $path): array
    {
        $json = file_get_contents($path);
        $userArr = json_decode($json, true);
        return ($userArr) ? $userArr : [];
    }
}