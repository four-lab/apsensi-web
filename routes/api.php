<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\ExcusesController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('forgot-password', 'forgotPassword')->name('forgot-password');
    Route::post('verify-code', 'verifyCode')->name('verify-code');
    Route::post('reset-password', 'resetPassword')->name('reset-password');
    Route::delete('logout', 'logout')->middleware('auth:sanctum')->name('logout');
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('holidays', [HolidayController::class, 'index'])->name('holidays');
    Route::get('schedules', [ScheduleController::class, 'index'])->name('schedules');
   
    Route::prefix('/excuses')->name('excuses.')->group(function () {
        Route::get('/', [ExcusesController::class, 'index'])->name('index');
        Route::post('/create', [ExcusesController::class, 'create'])->name('create');
    });

    Route::prefix('attendances')->name('attendance.')
        ->controller(AttendanceController::class)->group(function () {
            Route::get('status', 'status')->name('status');
            Route::post('attempt', 'attempt')->name('attempt');
            Route::post('valid-area', 'validArea')->name('valid-area');
        });

    Route::prefix('user')->controller(UserController::class)->group(function () {
        Route::get('/', 'show')->name('user');
        Route::match(['put', 'patch'], '/', 'update')->name('user.update');
    });
});
