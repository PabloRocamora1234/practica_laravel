<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Middleware\Validateid;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/alumnos', [AlumnoController::class, 'index']);
Route::get('/alumnos/{id}', [AlumnoController::class, 'show'])->middleware(Validateid::class);
Route::post('/alumnos', [AlumnoController::class, 'store']);
Route::put('/alumnos/{id}', [AlumnoController::class, 'update'])->middleware(Validateid::class);
Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy'])->middleware(Validateid::class);
