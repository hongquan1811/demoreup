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
        Route::get('students/search',[\App\Http\Controllers\StudentController::class,'studentSearch'])->name('studentSearch');
        Route::resource('students', \App\Http\Controllers\StudentController::class);
        Route::get('classrooms/search',[\App\Http\Controllers\ClassroomController::class,'classroomSearch'])->name('classroomSearch');
        Route::resource('classrooms', \App\Http\Controllers\ClassroomController::class);
        Route::get('mentors/search', [\App\Http\Controllers\MentorController::class, 'mentorSearch'])->name('mentorSearch');
        Route::resource('mentors', \App\Http\Controllers\MentorController::class);
        Route::get('schools/search', [\App\Http\Controllers\SchoolController::class, 'schoolSearch'])->name('schoolSearch');
        Route::resource('schools', \App\Http\Controllers\SchoolController::class);
    });
});
