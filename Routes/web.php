<?php

use System\Route;
use App\Controller\Auth\LoginController;
use App\Controller\BackView\UserController;
use App\Controller\BackView\StudentController;
use App\Controller\BackView\DashboardController;

/**
 * cargar el autoloader de composer Y la configuracion de la aplicacion
 */
require_once dirname(__DIR__) . '/System/Autoload.php';

//login
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/', [LoginController::class, 'store']);
Route::get('/admin', [LoginController::class, 'admin'])->name('login.admin');
Route::post('/admin', [LoginController::class, 'adminstore']);

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard.index');

//crud users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/create', [UserController::class, 'store']);
Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/edit', [UserController::class, 'update']);
Route::get('/users/delete', [UserController::class, 'destroy'])->name('users.destroy');

//crud students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students/create', [StudentController::class, 'store']);
Route::get('/students/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::post('/students/edit', [StudentController::class, 'update']);
Route::get('/students/delete', [StudentController::class, 'destroy'])->name('students.destroy');
