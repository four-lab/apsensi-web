<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\ScheduleController;
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

Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user();
});

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

    Route::prefix('attendances')->name('attendance.')
        ->controller(AttendanceController::class)->group(function () {
            Route::get('status', 'status')->name('status');
            Route::post('attempt', 'attempt')->name('attempt');
        });
});
