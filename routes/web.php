<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminProjectController;

Route::get('/', [PortfolioController::class, 'home'])->name('home');

Route::get('/contact', [PortfolioController::class, 'contact'])->name('contact');

use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');

Route::get('/admin/login', function () {
    return view('login');
});

Route::post('/admin/login', [PortfolioController::class, 'login']);
Route::post('/logout', [PortfolioController::class, 'logout']);


Route::get('/admin/messages', [ContactController::class, 'index']);
Route::get('/admin/messages/{id}/delete', [ContactController::class, 'destroy']);

Route::get('/admin/projects', [AdminProjectController::class, 'index']);

Route::get('/admin/projects/create', [AdminProjectController::class, 'create']);

Route::post('/admin/projects/store', [AdminProjectController::class, 'store']);

Route::get('/admin/projects/{id}/edit', [AdminProjectController::class, 'edit']);

Route::put('/admin/projects/{id}/update', [AdminProjectController::class, 'update']);

Route::get('/admin/projects/{id}/delete', [AdminProjectController::class, 'destroy']);

Route::post('/admin/projects/upload', [AdminProjectController::class, 'upload']);