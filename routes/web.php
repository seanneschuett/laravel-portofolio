<?php

use App\Http\Controllers\AdminCertificateController;
use App\Http\Controllers\AdminExperienceController;
use App\Http\Controllers\AdminFeedbackController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\AdminSkillController;
use App\Http\Controllers\AdminTestimonialController;
use App\Http\Controllers\AdminUploadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'home'])->name('home');

Route::get('/about', [PortfolioController::class, 'about'])->name('about');

Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects.index');
Route::get('/projects/{project}', [PortfolioController::class, 'projectShow'])->name('projects.show');
Route::post('/projects/{project}/feedback', [PortfolioController::class, 'storeFeedback'])
    ->middleware('throttle:5,1')
    ->name('projects.feedback');

Route::get('/certificates', [PortfolioController::class, 'certificates'])->name('certificates.index');

Route::get('/blog', [PortfolioController::class, 'blog'])->name('blog.index');
Route::get('/blog/{slug}', [PortfolioController::class, 'postShow'])->name('blog.show');

Route::get('/cv', [PortfolioController::class, 'cv'])->name('cv');

Route::get('/contact', [PortfolioController::class, 'contact'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');

Route::post('/testimonials', [PortfolioController::class, 'storeTestimonial'])
    ->middleware('throttle:5,1')
    ->name('testimonials.store');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', function () {
        return view('login');
    })->name('login');
});

Route::post('/admin/login', [PortfolioController::class, 'login'])->middleware('throttle:5,1');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [PortfolioController::class, 'logout'])->name('logout');

    Route::get('/admin/profile', [AdminProfileController::class, 'edit']);
    Route::put('/admin/profile', [AdminProfileController::class, 'update']);

    Route::get('/admin/projects', [AdminProjectController::class, 'index']);
    Route::get('/admin/projects/create', [AdminProjectController::class, 'create']);
    Route::post('/admin/projects/store', [AdminProjectController::class, 'store']);
    Route::get('/admin/projects/{id}/edit', [AdminProjectController::class, 'edit']);
    Route::put('/admin/projects/{id}/update', [AdminProjectController::class, 'update']);
    Route::delete('/admin/projects/{id}/delete', [AdminProjectController::class, 'destroy']);
    Route::post('/admin/projects/upload', [AdminProjectController::class, 'upload']);

    Route::get('/admin/skills', [AdminSkillController::class, 'index']);
    Route::post('/admin/skills', [AdminSkillController::class, 'store']);
    Route::put('/admin/skills/{id}', [AdminSkillController::class, 'update']);
    Route::delete('/admin/skills/{id}', [AdminSkillController::class, 'destroy']);

    Route::get('/admin/experience', [AdminExperienceController::class, 'index']);
    Route::post('/admin/experience', [AdminExperienceController::class, 'store']);
    Route::put('/admin/experience/{id}', [AdminExperienceController::class, 'update']);
    Route::delete('/admin/experience/{id}', [AdminExperienceController::class, 'destroy']);

    Route::get('/admin/certificates', [AdminCertificateController::class, 'index']);
    Route::get('/admin/certificates/create', [AdminCertificateController::class, 'create']);
    Route::post('/admin/certificates', [AdminCertificateController::class, 'store']);
    Route::get('/admin/certificates/{id}/edit', [AdminCertificateController::class, 'edit']);
    Route::put('/admin/certificates/{id}', [AdminCertificateController::class, 'update']);
    Route::delete('/admin/certificates/{id}', [AdminCertificateController::class, 'destroy']);

    Route::get('/admin/testimonials', [AdminTestimonialController::class, 'index']);
    Route::post('/admin/testimonials/{id}/approve', [AdminTestimonialController::class, 'approve']);
    Route::delete('/admin/testimonials/{id}', [AdminTestimonialController::class, 'destroy']);

    Route::get('/admin/posts', [AdminPostController::class, 'index']);
    Route::get('/admin/posts/create', [AdminPostController::class, 'create']);
    Route::post('/admin/posts', [AdminPostController::class, 'store']);
    Route::get('/admin/posts/{id}/edit', [AdminPostController::class, 'edit']);
    Route::put('/admin/posts/{id}', [AdminPostController::class, 'update']);
    Route::delete('/admin/posts/{id}', [AdminPostController::class, 'destroy']);

    Route::get('/admin/feedback', [AdminFeedbackController::class, 'index']);
    Route::post('/admin/feedback/{id}/approve', [AdminFeedbackController::class, 'approve']);
    Route::delete('/admin/feedback/{id}', [AdminFeedbackController::class, 'destroy']);

    Route::post('/admin/upload/image', [AdminUploadController::class, 'image']);
    Route::post('/admin/upload/file', [AdminUploadController::class, 'file']);

    Route::get('/admin/messages', [ContactController::class, 'index']);
    Route::delete('/admin/messages/{id}/delete', [ContactController::class, 'destroy']);
});
