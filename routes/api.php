<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\CertificateController;
use Illuminate\Support\Facades\Route;

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/experience', [ExperienceController::class, 'index']);
Route::get('/skills', [SkillController::class, 'index']);
Route::get('/certificates', [CertificateController::class, 'index']);
