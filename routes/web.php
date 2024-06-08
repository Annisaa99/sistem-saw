<?php

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
Route::group(['middleware'=>['auth']], function(){


Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');




Route::get('/data', [App\Http\Controllers\DataController::class, 'index'])->name('data.index');
Route::get('/data/detail', [App\Http\Controllers\DataController::class, 'detail'])->name('data.detail');
Route::get('/data/create', [App\Http\Controllers\DataController::class, 'create'])->name('data.create');
Route::post('/data/store', [App\Http\Controllers\DataController::class, 'store'])->name('data.store');
Route::get('/data/destroy/{id}', [App\Http\Controllers\DataController::class, 'destroy'])->name('data.destroy');
Route::get('/data/edit/{id}', [App\Http\Controllers\DataController::class, 'edit'])->name('data.edit');
Route::post('/data/update', [App\Http\Controllers\DataController::class, 'update'])->name('data.update');


Route::get('/nasabah', [App\Http\Controllers\NasabahController::class, 'index'])->name('nasabah.index');
Route::get('/nasabah/create', [App\Http\Controllers\NasabahController::class, 'create'])->name('nasabah.create');
Route::post('/nasabah/store', [App\Http\Controllers\NasabahController::class, 'store'])->name('nasabah.store');
Route::get('/nasabah/destroy/{id}', [App\Http\Controllers\NasabahController::class, 'destroy'])->name('nasabah.destroy');
Route::get('/nasabah/edit/{id}', [App\Http\Controllers\NasabahController::class, 'edit'])->name('nasabah.edit');
Route::post('/nasabah/update', [App\Http\Controllers\NasabahController::class, 'update'])->name('nasabah.update');


Route::get('/kriteria', [App\Http\Controllers\KriteriaController::class, 'index'])->name('kriteria.index');
Route::get('/kriteria/create', [App\Http\Controllers\KriteriaController::class, 'create'])->name('kriteria.create');
Route::post('/kriteria/store', [App\Http\Controllers\KriteriaController::class, 'store'])->name('kriteria.store');
Route::get('/kriteria/destroy/{id}', [App\Http\Controllers\KriteriaController::class, 'destroy'])->name('kriteria.destroy');
Route::get('/kriteria/edit/{id}', [App\Http\Controllers\KriteriaController::class, 'edit'])->name('kriteria.edit');
Route::post('/kriteria/update', [App\Http\Controllers\KriteriaController::class, 'update'])->name('kriteria.update');
Route::get('/kriteria/detail/{id}', [App\Http\Controllers\KriteriaController::class, 'detail'])->name('kriteria.detail');



Route::get('/nilaikriteria/create/{id_kriteria}', [App\Http\Controllers\NilaiKriteriaController::class, 'create'])->name('nilaikriteria.create');
Route::post('/nilaikriteria/store', [App\Http\Controllers\NilaiKriteriaController::class, 'store'])->name('nilaikriteria.store');
Route::get('/nilaikriteria/destroy/{id}', [App\Http\Controllers\NilaiKriteriaController::class, 'destroy'])->name('nilaikriteria.destroy');
Route::get('/nilaikriteria/edit/{id}', [App\Http\Controllers\NilaiKriteriaController::class, 'edit'])->name('nilaikriteria.edit');
Route::post('/nilaikriteria/update', [App\Http\Controllers\NilaiKriteriaController::class, 'update'])->name('nilaikriteria.update');


Route::get('/pengajuan', [App\Http\Controllers\PengajuanController::class, 'index'])->name('pengajuan.index');
Route::get('/pengajuan/create', [App\Http\Controllers\PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan/store', [App\Http\Controllers\PengajuanController::class, 'store'])->name('pengajuan.store');
Route::get('/pengajuan/destroy/{id}', [App\Http\Controllers\PengajuanController::class, 'destroy'])->name('pengajuan.destroy');
Route::get('/pengajuan/edit/{id}', [App\Http\Controllers\PengajuanController::class, 'edit'])->name('pengajuan.edit');
Route::post('/pengajuan/update', [App\Http\Controllers\PengajuanController::class, 'update'])->name('pengajuan.update');
});
Auth::routes();
