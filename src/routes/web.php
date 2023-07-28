<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DateController;
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

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/work/start', [AttendanceController::class, 'startWork'])->name('work.start');
Route::post('/work/end', [AttendanceController::class, 'endWork'])->name('work.end');
Route::post('/break/start', [AttendanceController::class, 'startBreak'])->name('break.start');
Route::post('/break/end', [AttendanceController::class, 'endBreak'])->name('break.end');
Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'index']);
});
Route::get('/date', [DateController::class, 'index'])->name('date.index');
