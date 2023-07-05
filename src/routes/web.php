<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/', [AttendanceController::class, 'startWork']);
Route::post('/', [AttendanceController::class, 'endWork']);
Route::post('/', [AttendanceController::class, 'startBreak']);
Route::post('/', [AttendanceController::class, 'endBreak']);
Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'index']);
});
