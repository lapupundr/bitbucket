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
//        if (!filter_var($userArr['login'], FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^M(.*)/"))) {
//
//        }
        if (!filter_var($userArr['mail'], FILTER_VALIDATE_EMAIL)) {
            $result['mail'] = 'You should enter an e-mail address.';

        }

        return $result;
    }
}