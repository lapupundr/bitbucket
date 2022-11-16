<?php

declare(strict_types=1);

namespace Auth\Model;

class Validate implements ValidateInterface
{
    /**
     * @inheritDoc
     */
    public function execute(array $userArr): array
    {
        $result = [];
        foreach ($userArr as $key => $value) {
            if (empty($value)){
                $result[$key] = 'The field ' . $key . ' cannot be empty.';
                $result['error'] = 'errorRegistration';
            }
        }
        return $result;
    }
}