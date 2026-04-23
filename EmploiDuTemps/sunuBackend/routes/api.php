<?php

use App\Http\Controllers\Api\ProfesseurController;
use App\Http\Controllers\Api\SalleController;
use App\Http\Controllers\Api\DepartementController;
use App\Http\Controllers\Api\CoursController;
use App\Http\Controllers\Api\SeanceController;
use App\Http\Controllers\Api\NiveauController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/dashboard/stats', [DashboardController::class, 'index']);
use App\Http\Controllers\Api\FiliereController;
use App\Http\Controllers\Api\CreneauHoraireController;

Route::apiResource('filieres', FiliereController::class);
Route::apiResource('niveaux', NiveauController::class);
Route::apiResource('professeurs', ProfesseurController::class);
Route::apiResource('salles', SalleController::class);
Route::apiResource('departements', DepartementController::class);
Route::apiResource('cours', CoursController::class);
Route::apiResource('seances', SeanceController::class);
Route::apiResource('creneaux', CreneauHoraireController::class);
