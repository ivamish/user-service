<?php

namespace App\Services;

use App\DTOs\AuthDto;
use App\Models\User;

class AuthService
{
    /**
     * Create user and return the token
     * @param AuthDto $authDto
     * @return string
     */
    public function signUp(AuthDto $authDto) : string
    {
        $user = User::query()->create($authDto->toArray());
        return $user->createToken('email')->plainTextToken;
    }
}
