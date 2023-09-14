<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MHS\MahasiswaController;
use App\Http\Controllers\AUTH\LoginController;
use App\Http\Controllers\AUTH\RegisterController;
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

Route::get('/mahasiswa',[MahasiswaController::class,'index']);
Route::post('/tambah-mahasiswa',[MahasiswaController::class,'create']);
Route::post('/update-mahasiswa/{id}',[MahasiswaController::class,'update']);
Route::delete('/hapus-data-mahasiswa/{id}',[MahasiswaController::class,'destroy']);



Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/register/',[RegisterController::class,'index']);
Route::post('/register/',[RegisterController::class,'register']);
