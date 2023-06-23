<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterUserRequest $request)
    {
        //
        $data = $request->validated();

        $user = User::create($data);

        return response()->json([
            'access_token' => $user->createToken('client')->plainTextToken,
        ]);

    }
}
