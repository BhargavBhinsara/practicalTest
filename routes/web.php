<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [AdminController::class, 'index'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('auth.check');

Route::group(['middleware' => 'admin'], function () {

    Route::get('/', [FormController::class, 'index'])->name('home');
    Route::get('/create', [FormController::class, 'create'])->name('form.create');
    Route::post('/create', [FormController::class, 'store'])->name('form.store');

    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
});
