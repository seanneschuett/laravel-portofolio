<?php

use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'home'])->name('home');

Route::get('/contact', [PortfolioController::class, 'contact'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', function () {
        return view('login');
    })->name('login');
});

Route::post('/admin/login', [PortfolioController::class, 'login'])->middleware('throttle:5,1');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [PortfolioController::class, 'logout'])->name('logout');

    Route::get('/admin/messages', [ContactController::class, 'index']);
    Route::delete('/admin/messages/{id}/delete', [ContactController::class, 'destroy']);

    Route::get('/admin/projects', [AdminProjectController::class, 'index']);

    Route::get('/admin/projects/create', [AdminProjectController::class, 'create']);

    Route::post('/admin/projects/store', [AdminProjectController::class, 'store']);

    Route::get('/admin/projects/{id}/edit', [AdminProjectController::class, 'edit']);

    Route::put('/admin/projects/{id}/update', [AdminProjectController::class, 'update']);

    Route::delete('/admin/projects/{id}/delete', [AdminProjectController::class, 'destroy']);

    Route::post('/admin/projects/upload', [AdminProjectController::class, 'upload']);
});
