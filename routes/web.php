<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;

use App\Http\Controllers\UserController;
Route::resource('modules', ModuleController::class);




Route::resource('users', UserController::class);

