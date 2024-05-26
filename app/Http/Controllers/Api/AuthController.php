<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\OtpException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgotPassRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\ResetPassRequest;
use App\Http\Requests\Api\Auth\VerifyCodeRequest;
use App\Models\Employee;
use App\Repos\OtpRepository;
use App\Services\OtpService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            ], 'Login sukses');
        }

        return $this->error(message: 'Username atau password salah', code: 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return $this->success(message: 'Berhasil logout');
    }

    public function forgotPassword(ForgotPassRequest $request)
    {
        $user = Employee::where('username', $request->username)->first();

        if (!$user)
            return $this->error(message: 'Username tidak terdaftar', code: 401);

        OtpRepository::send($user);

        return $this->success(
            message: 'Kode OTP telah dikirim ke ' . obfuscate_email($user->email)
        );
    }

    public function verifyCode(VerifyCodeRequest $request)
    {
        $user = Employee::where('username', $request->username)->first();

        try {
            OtpService::verify($user, $request->code, false);
            return $this->success(message: 'OTP Berhasil diverifikasi');
        } catch (OtpException $e) {
            return $this->error(message: $e->getMessage(), code: 401);
        }
    }

    public function resetPassword(ResetPassRequest $request)
    {
        $user = Employee::where('username', $request->username)->first();

        try {
            OtpService::verify($user, $request->code);
            $user->update(['password' => Hash::make($request->password)]);

            return $this->success(message: 'Password Berhasil direset');
        } catch (OtpException $e) {
            return $this->error(message: $e->getMessage(), code: 401);
        }
    }
}
