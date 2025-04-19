<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('register', [\App\Http\Controllers\UsersController::class, 'register']);
Route::post('login', [\App\Http\Controllers\UsersController::class, 'login']);

Route::post('post', [\App\Http\Controllers\TaskController::class, 'store'])->middleware('auth:api');

Route::get('getalltasks', [\App\Http\Controllers\TaskController::class, 'index'])->middleware('auth:api');
Route::get('gettask/{id}', [\App\Http\Controllers\TaskController::class, 'show'])->middleware('auth:api');

Route::delete('deletetask/{id}', [\App\Http\Controllers\TaskController::class, 'destroy']);