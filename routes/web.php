<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
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

Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'store'])->name('login.store');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/accounts', [DashboardController::class, 'index'])->name('admin.dashboard');
});
