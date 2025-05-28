<?php

namespace App\Helpers;

class Error
{
    public static function defineReturnMessageAndCode(string $error = 'Erro interno no servidor'): array
    {
        $returnCode = match ($error) {
            'UserAlreadyExist' => '400',
            default => '500',
        };

        return [
            'success' => false,
            'message' => $error,
            'returnCode' => $returnCode
        ];
    }
}
