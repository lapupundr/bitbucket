<?php

declare(strict_types=1);

namespace Auth\Model;

class Validate implements ValidateInterface
{
    /**
     * @inheritDoc
     */
    public function execute(array $userArr, string $error): array
    {
        $result = [];
        foreach ($userArr as $key => $value) {
            if (empty($value)) {
                $result[$key] = 'php error: The field ' . $key . ' cannot be empty.';
                $result['error'] = $error;
            }
        }

        if ($error === 'errorRegistration') {
            $result = $this->errorRegistration($userArr, $result);
        }

        return $result;
    }

    public function errorRegistration(array $userArr, array $result): array
    {
        if (strlen($userArr['login']) < 6) {
            $result['login'] = 'php error: Login must be longer than 6 characters';
        }

        $checkPass = filter_var(
            $userArr['password'],
            FILTER_VALIDATE_REGEXP,
            ["options" => ["regexp" => "/^(?=.*[0-9])(?=.*[a-zA-Z])[0-9a-zA-Z]{6,}$/"]]
        );
        if (!$checkPass) {
            $result['password'] = 'php error: The password must consist of numbers, letters and 6 characters long.';
        }

        $checkName = filter_var(
            $userArr['name'],
            FILTER_VALIDATE_REGEXP,
            ["options" => ["regexp" => "/^[a-zA-Z]{2,}$/"]]
        );
        if (!$checkName) {
            $result['name'] = 'php error: Name should consist only from letters.';
        }

        if (!filter_var($userArr['mail'], FILTER_VALIDATE_EMAIL)) {
            $result['mail'] = 'php error: You should enter an e-mail address.';
        }
        return $result;
    }
}