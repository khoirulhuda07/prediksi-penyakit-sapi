<?php

use App\Http\Controllers\akunController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\datasetController;
use App\Http\Controllers\diagnosaController;
use App\Http\Controllers\gejalaController;
use App\Http\Controllers\penyakitController;
use App\Http\Controllers\riwayatController;
use App\Models\penyakit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[dashboardController::class,'index']);
Route::get('/penyakit',[penyakitController::class,'index']);
Route::get('/akurasi',[diagnosaController::class,'akurasi']);
Route::get('/diagnosa',[diagnosaController::class,'index']);
Route::post('/diagnosa/hasil',[diagnosaController::class,'prediksi']);
Route::middleware(['auth'])->group(function(){
    

Route::post('/penyakit/tambah',[penyakitController::class,'tambah']);
Route::post('/penyakit/update/{id}',[penyakitController::class,'update']);
Route::delete('/penyakit/delete/{id}',[penyakitController::class,'delete']);

Route::get('/gejala',[gejalaController::class,'index']);
Route::post('/gejala/tambah',[gejalaController::class,'tambah']);
Route::post('/gejala/update/{id}',[gejalaController::class,'update']);
Route::delete('/gejala/delete/{id}',[gejalaController::class,'delete']);

Route::get('/dataset',[datasetController::class,'index']);
Route::post('/dataset/tambah',[datasetController::class,'tambah']);
Route::post('/dataset/ubah/{id}',[datasetController::class,'ubah']);
Route::delete('/dataset/hapus/{id}',[datasetController::class,'hapus']);
Route::get('/akun',[akunController::class,'index']);
Route::post('/akun/tambah/',[akunController::class,'tambah']);
Route::post('/akun/ubah/{id}',[akunController::class,'ubah']);
Route::delete('/akun/hapus/{id}',[akunController::class,'hapus']);
Route::get('/riwayat',[riwayatController::class,'index']);
Route::delete('/riwayat/hapus/{id}',[riwayatController::class,'hapus']);
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
