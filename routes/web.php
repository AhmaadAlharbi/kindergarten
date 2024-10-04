<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\StudentController;

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
Route::resource('/teachers', TeacherController::class);
Route::resource('/students', StudentController::class);
Route::resource('/guardians', GuardianController::class);