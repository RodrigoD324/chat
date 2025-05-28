<?php

namespace App\Helpers;

class Success
{
    public static function defineReturnMessageAndCode(string $success = 'Sucesso'): array
    {
        $returnCode = match ($success) {
            'UserRegistered' => '201',
            default => '200',
        };

        return [
            'success' => true,
            'message' => $success,
            'returnCode' => $returnCode
        ];
    }
}
