<?php

namespace App\Livewire\Auth;

use App\Exceptions\OtpException;
use App\Models\User;
use App\Repos\OtpRepository;
use App\Services\OtpService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ResetPassword extends Component
{
    public $verified = false;
    public $email = null;
    public $canResend = true;

    #[Validate('required|array|size:6')]
    public $code = [];

    #[Validate('required|min:8|confirmed')]
    public $password = '';

    #[Validate('required|min:8|same:password')]
    public $password_confirmation = '';

    public function mount()
    {
        if (!session('resetmail'))
            return $this->redirect('forgot-password');

        $this->email = session('resetmail');
    }

    public function render()
    {
        return view('pages.auth.reset-pass')
            ->layout('components.layouts.auth-sided');
    }

    public function resend()
    {
        $user = User::where('email', $this->email)->first();
        OtpRepository::send($user);

        $this->canResend = false;
        $this->dispatch('otp-sent');
    }

    public function verify()
    {
        $this->validateOnly('code');

        $user = User::where('email', $this->email)->first();
        $code = implode('', array_map(fn ($code) => trim($code), $this->code));

        try {
            OtpService::verify($user, $code);
            session()->remove('resetmail');

            $this->verified = true;
        } catch (OtpException $e) {
            $this->dispatch('otp-error', $e->getMessage());
        }
    }

    public function resetPassword()
    {
        $this->validateOnly('password');

        $user = User::where('email', $this->email)->first();
        $user->update(['password' => Hash::make($this->password)]);

        Auth::login($user);
        return to_route('dashboard')
            ->with('swal-s', 'Password berhasil direset');
    }
}
