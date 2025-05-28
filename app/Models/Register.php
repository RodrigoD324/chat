<?php

namespace App\Models;

use App\Helpers\Error;
use Illuminate\Support\Facades\Hash;

class Register
{
    public function create(array $data): User|array
    {
        try {
            $exists = User::where('email', $data['email'])->exists();

            if ($exists) {
                throw new \Exception("UserAlreadyExist");
            }

        } catch (\Exception $e) {
            return Error::defineReturnMessageAndCode($e->getMessage());
        }

        return $this->createUser($data);
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
}
