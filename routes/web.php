<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/postlogin',[AuthController::class, 'postlogin'])->name('login.postlogin');
Route::get('/logout',[AuthController::class, 'logout'])->name('dashboard.logout');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('index.index');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('index.create');
    Route::get('/pegawai/edit{id}', [PegawaiController::class, 'edit'])->name('index.edit');
    Route::put('/pegawai/update{id}', [PegawaiController::class, 'update'])->name('index.update');
    Route::get('/pegawai/show', [PegawaiController::class, 'show'])->name('index.show');
    Route::delete('/pegawai/delete{id}', [PegawaiController::class, 'destroy'])->name('index.destroy');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('index.store');
    Route::get('/pegawai/{id}/profile', [PegawaiController::class, 'profile']);
});