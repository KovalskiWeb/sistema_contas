<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'store'])->name('login.store');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/accounts', [AccountController::class, 'index'])->name('admin.accounts.index');
    Route::get('/admin/account/{id}/edit', [AccountController::class, 'edit'])->name('admin.account.edit');
    Route::put('/admin/account/{id}/update', [AccountController::class, 'update'])->name('admin.account.update');
    Route::delete('/admin/account/{id}/delete', [AccountController::class, 'destroy'])->name('admin.account.destroy');
    Route::get('/admin/account', [AccountController::class, 'create'])->name('admin.account.create');
    Route::post('/admin/account', [AccountController::class, 'store'])->name('admin.account.store');

    Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
    Route::get('/admin/transaction', [TransactionController::class, 'create'])->name('admin.transaction.create');
    Route::post('/admin/transaction', [TransactionController::class, 'store'])->name('admin.transaction.store');
});
