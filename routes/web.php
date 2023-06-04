<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\facultiesController;
use App\Http\Controllers\locationsController;
use App\Http\Controllers\majorsController;
use App\Http\Controllers\studentsController;
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

Route::get('/', [dashboardController::class, 'index']);
Route::get('/login', [authController::class, 'formLogin']);

Route::get('/mahasiswa',[studentsController::class,'index']);
Route::post('/mahasiswa/tambah',[studentsController::class,'add']);
Route::get("/mahasiswa/{id}",[studentsController::class,'formEdit']);
Route::put('/mahasiswa/{id}',[studentsController::class,'editData']);
Route::put('/mahasiswa/foto/{id}',[studentsController::class,'editFoto']);
Route::get('/mahasiswa/hapus/{id}',[studentsController::class,'delete']);

Route::get('/fakultas',[facultiesController::class, 'index']);
Route::post('/fakultas/tambah',[facultiesController::class, 'add']);
Route::get('/fakultas/{id}',[facultiesController::class, 'formEdit']);
Route::put('/fakultas/{id}',[facultiesController::class, 'edit']);
Route::get('/fakultas/hapus/{id}',[facultiesController::class, 'delete']);

Route::get('jurusan',[majorsController::class,'index']);
Route::post('jurusan/tambah',[majorsController::class, 'add']);
Route::get('jurusan/{id}',[majorsController::class,'formEdit']);
Route::put('/jurusan/{id}',[majorsController::class,'edit']);
Route::get('/jurusan/hapus/{id}',[majorsController::class,'delete']);

Route::get('/lokasi', [locationsController::class,'index']);
Route::post('/lokasi/tambah',[locationsController::class,'add']);