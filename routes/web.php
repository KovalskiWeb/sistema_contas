<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'store'])->name('login.store');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/accounts', [AccountController::class, 'index'])->name('admin.accounts.index');
    Route::get('/account/{id}/edit', [AccountController::class, 'edit'])->name('admin.account.edit');
    Route::put('/account/{id}/update', [AccountController::class, 'update'])->name('admin.account.update');
    Route::delete('/account/{id}/delete', [AccountController::class, 'destroy'])->name('admin.account.destroy');
    Route::get('/account', [AccountController::class, 'create'])->name('admin.account.create');
    Route::post('/account', [AccountController::class, 'store'])->name('admin.account.store');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
    Route::get('/transaction', [TransactionController::class, 'create'])->name('admin.transaction.create');
    Route::get('/transaction/search', [TransactionController::class, 'search'])->name('admin.transaction.search');
    Route::post('/transaction', [TransactionController::class, 'store'])->name('admin.transaction.store');
});
