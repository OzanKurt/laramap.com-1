<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Firebase\JWT\JWT;

class NoltController extends Controller
{
    /**
     * @param User $user
     * @return string
     */
    public function generateNoltToken($token)
    {
        $user = (new \App\Models\User)->find(auth()->guard('api')->user()->id);

        $payload = [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->username,
            'imageUrl' => $user->gravatar,
        ];

        return JWT::encode($payload, 'YOUR_SSO_SECRET_KEY', 'HS256');
    }
}
