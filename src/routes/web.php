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
Route::post('/work/start', [AttendanceController::class, 'startWork']);
Route::post('/work/end', [AttendanceController::class, 'endWork']);
Route::post('/break/start', [AttendanceController::class, 'startBreak']);
Route::post('/break/end', [AttendanceController::class, 'endBreak']);
Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'index']);
});
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);