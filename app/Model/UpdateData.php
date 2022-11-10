<?php

declare(strict_types=1);

namespace Auth\Model;

class UpdateData implements UpdateDataInterface
{
    /**
     * @inheritDoc
     */
    public function execute(string $path, array $data): void
    {
//        unlink($path);
        $userId = $_SESSION['userId'];
        $_SESSION['userName'] = $data[$userId]['name'];
        $data = json_encode($data);
        $file = fopen($path, 'w+');
        fwrite($file, $data);
        fclose($file);
    }
}