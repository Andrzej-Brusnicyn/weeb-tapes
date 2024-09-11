<?php

use App\Http\Controllers\Api\V1\TapesController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::apiResource('tapes', TapesController::class)->only(['index', 'show']);

    Route::apiResource('tapes', TapesController::class)->only(['store', 'update', 'destroy'])->middleware(['auth:sanctum', 'role:admin']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');



Route::get('/checkpermission', function () {
    return 'ok';})->middleware('auth:sanctum', 'role:admin');