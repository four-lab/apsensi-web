<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Repos\OtpRepository;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public $email;

    public function render()
    {
        return view('pages.auth.forgot-pass')
            ->layout('components.layouts.auth-sided');
    }

    public function sendCode()
    {
        $this->validate();

        if ($user = User::where('email', $this->email)->first()) {
            OtpRepository::send($user);
            Session::put('resetmail', $this->email);

            return $this->redirect('reset-password');
        }

        $this->dispatch('empty-email');
    }
}
