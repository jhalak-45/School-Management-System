<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CalanderController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::prefix('/home')->group(function () {
    Route::get('/faculties', [FacultyController::class, 'index'])->name('faculty.index');
    Route::get('/faculties/add_new', [FacultyController::class, 'create'])->name('faculty.create');
    Route::post('/faculties/add_new', [FacultyController::class, 'save'])->name('faculty.store');
    Route::get('/faculties/{faculty}/edit/', [FacultyController::class, 'edit'])->name('faculty.edit');
    Route::put('/faculties/{faculty}/update', [FacultyController::class, 'update'])->name('faculty.update');
    Route::delete('/faculties/{faculty}', [FacultyController::class, 'delete'])->name('faculty.delete');
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    // Route::resource('classes', ClassController::class);
    Route::resource('calander', CalanderController::class);


    Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/classes/create', [ClassController::class, 'create'])->name('classes.create');
    Route::post('/classes', [ClassController::class, 'store'])->name('classes.store');
    Route::get('/classes/{class}/edit/', [ClassController::class, 'edit'])->name('classes.edit');
    Route::put('/classes/{class}', [ClassController::class, 'update'])->name('classes.update');
    Route::delete('/classes/{class}', [ClassController::class, 'destroy'])->name('classes.destroy');


})->middleware('Auth');

