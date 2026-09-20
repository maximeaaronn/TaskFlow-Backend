<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('tasks', TaskContoller::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

 