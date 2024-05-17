<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Models\Employee;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponser;

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('api')->validate($credentials)) {
            $user = Employee::where('username', $request->username)
                ->first();

            return $this->success([
                'token' => $user->createToken('api-token')->plainTextToken,
            ], 'Login successfully');
        }

        return $this->error(message: 'Invalid username or password', code: 401);
    }
}
