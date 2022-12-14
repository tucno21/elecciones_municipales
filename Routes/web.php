<?php

use System\Route;
use App\Controller\Auth\LoginController;
use App\Controller\BackView\UserController;
use App\Controller\BackView\VotoController;
use App\Controller\BackView\DesignController;
use App\Controller\BackView\StudentController;
use App\Controller\BackView\CandidateController;
use App\Controller\BackView\DashboardController;
use App\Controller\BackView\VotingDateController;

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
Route::get('/dashboard/excel', [DashboardController::class, "excel"])->name('dashboard.excel');


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

Route::get('/students/tablemodel', [StudentController::class, 'tablemodel'])->name('students.tablemodel');
Route::get('/students/report', [StudentController::class, 'report'])->name('students.report');
Route::get('/students/uploaddata', [StudentController::class, 'uploaddata'])->name('students.uploaddata');
Route::post('/students/uploaddata', [StudentController::class, 'uploaddatastore']);
Route::get('/students/deletedata', [StudentController::class, 'deletedata'])->name('students.deletedata');

//crud candidates
Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');
Route::get('/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('/candidates/create', [CandidateController::class, 'store']);
Route::get('/candidates/edit', [CandidateController::class, 'edit'])->name('candidates.edit');
Route::post('/candidates/edit', [CandidateController::class, 'update']);
Route::get('/candidates/delete', [CandidateController::class, 'destroy'])->name('candidates.destroy');

//voting date
Route::get('/votingdate', [VotingDateController::class, 'index'])->name('votingdate.index');
Route::get('/votingdate/edit', [VotingDateController::class, 'edit'])->name('votingdate.edit');
Route::post('/votingdate/edit', [VotingDateController::class, 'update']);

//DISE??O LOGIN voto
Route::get('/design', [DesignController::class, 'index'])->name('design.index');
Route::get('/design/edit', [DesignController::class, 'edit'])->name('design.edit');
Route::post('/design/edit', [DesignController::class, 'update']);

//tuvoto
Route::get('/tuvoto', [VotoController::class, 'index'])->name('tuvoto.index');
Route::post('/tuvoto', [VotoController::class, 'store']);
