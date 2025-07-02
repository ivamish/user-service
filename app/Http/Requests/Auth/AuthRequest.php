<?php

namespace App\Http\Requests\Auth;

use App\Contracts\Dto;
use App\DTOs\AuthDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Email;
use Illuminate\Validation\Rules\Password;
use ReflectionException;

class AuthRequest extends FormRequest implements Dto
{

    public function authorize(): bool
    {
        return auth()->guest();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'unique:users', Email::default()],
            'gender' => ['required', 'in:m,f'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                Password::default()
                    ->letters()
                    ->numbers()
                    ->mixedCase()
                    ->symbols()
            ],
        ];
    }

    /**
     * @throws ReflectionException
     */
    public function toDto(): AuthDto
    {
        return AuthDto::fromArray($this->validated());
    }
}
