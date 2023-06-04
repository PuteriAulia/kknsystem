<?php

use App\Http\Controllers\API\authAPI;
use App\Http\Controllers\API\facultiesAPI;
use App\Http\Controllers\facultiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registrasi',[authAPI::class,'register']);
Route::post('/login',[authAPI::class,'login']);

Route::get('/fakultas',[facultiesAPI::class,'getAll'])->middleware('auth:sanctum');
Route::put('/fakultas/{id}',[facultiesAPI::class,'edit']);
Route::put('/fakultas/hapus/{id}',[facultiesAPI::class,'delete']);
Route::post('/fakultas/tambah',[facultiesAPI::class,'store']);
