<?php

namespace App\DTOs;

use App\Contracts\Dto;
use App\Traits\HasToArray;
use Illuminate\Contracts\Support\Arrayable;

class AuthDto implements Arrayable
{
    use HasToArray;


    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $gender,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'gender' => $this->gender,
        ];
    }
}
