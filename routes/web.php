<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\DashboardsController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/register-student', function () {
    return view('welcome');
});
Route::get('/', [DashboardsController::class, 'index']);
Route::get('index', [DashboardsController::class, 'index']);