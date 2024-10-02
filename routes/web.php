<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubjectController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/register-student', function () {
    return view('welcome');
});
Route::get('/', [DashboardsController::class, 'index']);
Route::get('index', [DashboardsController::class, 'index']);

Route::resource('/subjects', SubjectController::class);
Route::resource('/departments', DepartmentController::class);