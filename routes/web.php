<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileProkerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AddUsersController;
use App\Http\Controllers\AddDepartementController;
use App\Http\Controllers\AddRolesController;
use App\Http\Controllers\AddProkerController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/addfile', [FileProkerController::class, 'create'])->name('add-file')->middleware('auth');
Route::post('/addfile', [FileProkerController::class, 'store'])->name('upload-file')->middleware('auth');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/users', [UsersController::class, 'users'])->name('users')->middleware('auth');
Route::get('/departement', [DepartementController::class, 'dept'])->name('dept')->middleware('auth');
Route::get('/roles', [RolesController::class, 'roles'])->name('roles')->middleware('auth');

Route::get('/course-list', [CourseController::class, 'list'])->name('course-list')->middleware('auth');
Route::get('/course-progress', [CourseController::class, 'progress'])->name('course-progress')->middleware('auth');
Route::get('/timeline', [TimelineController::class, 'timeline'])->name('timeline')->middleware('auth');

Route::get('/addusers', [AddUsersController::class, 'addusers'])->name('addusers')->middleware('auth');
Route::post('/addusers', [AddUsersController::class, 'store'])->name('store-user')->middleware('auth');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy')->middleware('auth');
Route::put('/users/update/{id}', [UsersController::class, 'update'])->name('users.update')->middleware('auth');

Route::get('/adddept', [AddDepartementController::class, 'adddept'])->name('adddept')->middleware('auth');
Route::post('/adddept', [AddDepartementController::class, 'store'])->name('store-dept')->middleware('auth');
Route::delete('/departement/{id}', [DepartementController::class, 'destroy'])->name('dept.destroy');
Route::put('/departement/update/{id}', [DepartementController::class, 'update'])->name('dept.update');

Route::get('/addroles', [AddRolesController::class, 'addroles'])->name('addroles')->middleware('auth');
Route::post('/addroles', [AddRolesController::class, 'store'])->name('store-roles')->middleware('auth');
Route::delete('/roles/{id}', [RolesController::class, 'destroy'])->name('role.destroy')->middleware('auth');
Route::put('/roles/update/{id}', [RolesController::class, 'update'])->name('roles.update')->middleware('auth');

Route::delete('/course-list/{id}', [CourseController::class, 'destroy'])->name('course.destroy')->middleware('auth');
Route::put('/course/update/{id}', [CourseController::class, 'update'])->name('course.update')->middleware('auth');
Route::get('/addcourse', [AddProkerController::class, 'addproker'])->name('addproker')->middleware('auth');
Route::post('/addcourse', [AddProkerController::class, 'store'])->name('store-course')->middleware('auth');

Route::delete('/course-progress/{id}', [FileProkerController::class, 'destroy'])->name('file.destroy')->middleware('auth');
Route::put('/course-progress/update/{id}', [FileProkerController::class, 'update'])->name('file.update')->middleware('auth');
Route::put('/course-progress/verified/{id}', [FileProkerController::class, 'verif'])->name('file.verif')->middleware('auth');
Route::put('/course-progress/revision/{id}', [FileProkerController::class, 'revision'])->name('file.revision')->middleware('auth');

Route::get('/show-data', [DashboardController::class, 'showData']);