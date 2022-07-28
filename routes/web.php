<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin/login', [\App\Http\Controllers\LoginController::class, 'index']);
Route::post('admin/login/store', [\App\Http\Controllers\LoginController::class, 'store']);

Route::middleware(['auth'])->group(function()
{
    Route::prefix('admin')->group(function()
    {
        Route::resource('students', \App\Http\Controllers\StudentResourceController::class);
        Route::resource('classrooms', \App\Http\Controllers\ClassroomController::class);
        Route::resource('mentors', \App\Http\Controllers\MentorController::class);
        Route::resource('schools', \App\Http\Controllers\SchoolController::class);
    });
});
