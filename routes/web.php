<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.register');
});

Route::get('index', [StudentController::class, 'index'])->name('index');

Route::get('students/create', [StudentController::class, 'create']);
Route::get('students/read', [StudentController::class, 'showData']);
Route::delete('students/{studentModel}/delete', [StudentController::class, 'destroy']);
Route::post('/students/store', [StudentController::class, 'store']);
Route::get('students/{studentModel}/show', [StudentController::class, 'show']);

// Registration routes
Route::post('admin/register', [UserController::class, 'register'])->name('registerSave');

// Login routes
Route::get('admin/login', [UserController::class, 'login'])->name('login');
Route::post('admin/login', [UserController::class, 'authenticate'])->name('loginMatch');
Route::get('logout',[UserController::class,'logout'])->name('logout');