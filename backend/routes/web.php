<?php

use Illuminate\Support\Facades\Route;



Route::prefix('auth')->group(function (){
    Route::get('/user', [\App\Http\Controllers\AuthController::class, 'getUser']);
    Route::delete('/user', [\App\Http\Controllers\AuthController::class, 'delete']);

    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});
Route::prefix('project')->group(function (){
    Route::get('/',[\App\Http\Controllers\ProjectController::class, 'get']);
    Route::get('/all',[\App\Http\Controllers\ProjectController::class, 'getAll']);
    Route::post('/', [\App\Http\Controllers\ProjectController::class, 'add']);
    Route::put('/', [\App\Http\Controllers\ProjectController::class, 'edit']);
    Route::delete('/', [\App\Http\Controllers\ProjectController::class, 'delete']);
});
Route::prefix('segment')->group(function (){
    Route::get('/',[\App\Http\Controllers\SegmentController::class, 'get']);
    Route::get('/all',[\App\Http\Controllers\SegmentController::class, 'getAll']);
    Route::post('/', [\App\Http\Controllers\SegmentController::class, 'add']);
    Route::put('/', [\App\Http\Controllers\SegmentController::class, 'edit']);
    Route::delete('/', [\App\Http\Controllers\SegmentController::class, 'delete']);
});
Route::prefix('session')->group(function (){
   Route::post('/start',[\App\Http\Controllers\SessionController::class, 'start']);
   Route::put('/end', [\App\Http\Controllers\SessionController::class, 'end']);
   Route::post('/change', [\App\Http\Controllers\SessionController::class, 'changeSegment']);
});
