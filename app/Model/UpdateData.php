<?php

declare(strict_types=1);

namespace Auth\Model;

class UpdateData implements UpdateDataInterface
{
    /**
     * @inheritDoc
     */
    public function execute(string $path, string $data): void
    {
        unlink($path);
        $file = fopen($path, 'a');
        fwrite($file, $data);
        fclose($file);
    }
}