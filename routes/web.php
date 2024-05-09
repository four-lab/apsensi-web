<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\SubjectController;
use App\Livewire\Auth\Login;
use App\Livewire\ClassroomPage;
use App\Livewire\Dashboard;
use App\Livewire\EmployeePage;
use App\Livewire\HolidayPage;
use App\Livewire\SubjectPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::get('employees', EmployeePage::class)->name('employees');
    Route::get('employees/datatables', EmployeeController::class)
        ->name('employees.datatables');

    Route::get('classrooms', ClassroomPage::class)->name('classrooms');
    Route::get('classrooms/datatables', ClassroomController::class)
        ->name('classrooms.datatables');

    Route::get('holidays', HolidayPage::class)->name('holidays');
    Route::get('holidays/json', [HolidayController::class, 'json'])
        ->name('holidays.json');

    Route::get('subjects', SubjectPage::class)->name('subjects');
    Route::get('subjects/datatables', SubjectController::class)
        ->name('subjects.datatables');

    Route::get('logout', function () {
        Auth::logout();
        Session::regenerate();

        return to_route('login');
    })->name('logout');
});
