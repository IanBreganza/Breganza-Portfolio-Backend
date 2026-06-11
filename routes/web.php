<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ExperienceController as AdminExperienceController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;
use Illuminate\Support\Facades\Route;

// Redirect root to admin dashboard
Route::get('/', function () {
    return redirect()->route('admin.projects.index');
});

// Admin panel — auth protected
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('admin.projects.index');
    })->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.projects.index');
        });

        Route::resource('projects', AdminProjectController::class)->except(['show']);
        Route::resource('experiences', AdminExperienceController::class)->except(['show']);
        Route::resource('skills', AdminSkillController::class)->except(['show']);
        Route::resource('certificates', AdminCertificateController::class)->except(['show']);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
