<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserProfileResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(): UserProfileResource
    {
        return UserProfileResource::make(auth()->user());
    }
}
