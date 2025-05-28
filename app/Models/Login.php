<?php

namespace App\Models;

use App\Helpers\Error;
use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Hash;

class Login
{
    public function login(array $data): array|User
    {
        try {
            $user = User::query()->where('email', $data['email'])->first();

            if (!$user) {
                throw new \Exception("UserNotExist");
            }

            $passwordMatch = Hash::check($data['password'], $user['password']);

            if (!$passwordMatch) {
                throw new \Exception("PasswordNotMatch");
            }
        } catch (\Exception $e) {
            return Error::defineReturnMessageAndCode($e->getMessage());
        }

        return $user;
    }

    public function google(array $data): User|bool
    {
        $payload = $this->validateGoogleData($data);

        if (!$payload) {
            return false;
        }

        $user = User::query()->where('google_sub', $payload['sub'])->first();

        if (!$user) {
            $user = $this->createUser($payload);
        }

        return $user;
    }

    private function createUser(array $data): User
    {
        return User::create([
            'email'         =>  $data['email'],
            'password'      =>  isset($data['password']) ? Hash::make($data['password']) : null,
            'google_sub'    =>  $data['sub'] ?? null,
            'name'          =>  $data['name'],
            'picture_url'   =>  $data['picture'] ?? null
        ]);
    }

    private function validateGoogleData(array $data): array|bool
    {
        if (!isset($data['credential']) || !isset($data['g_csrf_token'])) {
            return false;
        }

        $cookie = $_COOKIE['g_csrf_token'] ?? null;

        if ($data['g_csrf_token'] != $cookie) {
            return false;
        }

        $client = new GoogleClient(['client_id' => env('GOOGLE_CLIENT_ID')]);
        $payload = $client->verifyIdToken($data['credential']);

        return $payload;
    }
}
