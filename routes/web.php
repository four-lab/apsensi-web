<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\SubjectController;
use App\Livewire\AttendancePage;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\ClassroomPage;
use App\Livewire\Dashboard;
use App\Livewire\EmployeePage;
use App\Livewire\ExcusePage;
use App\Livewire\HolidayPage;
use App\Livewire\Schedule\ScheduleCreate;
use App\Livewire\SubjectPage;
use App\Livewire\Schedule\SchedulePage;
use App\Livewire\SchoolPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', fn () => view('pages.home'))->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('forgot-password', ForgotPassword::class)->name('forgot-pass');
    Route::get('reset-password', ResetPassword::class)->name('reset-pass');
});

Route::middleware('auth')->group(function () {
    Route::get('attendances', AttendancePage::class)->name('attendances');
    Route::get('chart', ChartController::class)->name('chart');
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::get('employees', EmployeePage::class)->name('employees');
    Route::get('employees/datatables', EmployeeController::class)
        ->name('employees.datatables');

    Route::get('excuses', ExcusePage::class)->name('excuses');

    Route::get('classrooms', ClassroomPage::class)->name('classrooms');
    Route::get('classrooms/datatables', ClassroomController::class)
        ->name('classrooms.datatables');

    Route::get('holidays', HolidayPage::class)->name('holidays');
    Route::get('holidays/json', [HolidayController::class, 'json'])
        ->name('holidays.json');

    Route::get('subjects', SubjectPage::class)->name('subjects');
    Route::get('subjects/datatables', SubjectController::class)
        ->name('subjects.datatables');

    Route::get('schedules', SchedulePage::class)->name('schedules');
    Route::get('schedules/{classroom}/create', ScheduleCreate::class)
        ->name('schedules.create');

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('school', SchoolPage::class)->name('school');
    });

    Route::get('logout', function () {
        Auth::logout();
        Session::regenerate();

        return to_route('login');
    })->name('logout');
});
