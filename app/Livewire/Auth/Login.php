<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|string|email')]
    public $email = '';

    #[Validate('required|string')]
    public $password = '';

    #[Validate('boolean')]
    public $remember = false;

    public function render()
    {
        return view('pages.auth.login')
            ->layout('components.layouts.auth-sided');
    }

    public function authenticate()
    {
        $this->validate();

        if(Auth::attempt($this->only('email', 'password'), $this->remember))
            return $this->redirect('/dashboard');

        $this->dispatch('login-failed', 'Username atau password salah');
    }
}
