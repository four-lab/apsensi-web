<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use App\Livewire\EmployeePage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('employees', EmployeePage::class)->name('employees');

    Route::get('logout', function () {
        Auth::logout();
        Session::regenerate();

        return to_route('login');
    })->name('logout');
});
