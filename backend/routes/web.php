<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TapesController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tapes', [TapesController::class, 'index']);
