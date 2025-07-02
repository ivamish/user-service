<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use ReflectionException;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    )
    {
    }

    /**
     * @throws ReflectionException
     */
    public function signUp(AuthRequest $request) : JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'token' => $this->authService->signUp($request->toDto()),
            ]
        );
    }
}
