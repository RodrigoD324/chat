<?php

namespace App\Models;

use Google\Client as GoogleClient;

class Login
{
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
            'password'      =>  $data['password'] ?? null,
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
