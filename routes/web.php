<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('homepage.index');
});
// Akhir bagian halaman homepage

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/postlogin',[AuthController::class, 'postlogin'])->name('login.postlogin');
Route::get('/logout',[AuthController::class, 'logout'])->name('dashboard.logout');
// Akhir bagian halaman login

Route::group(['middleware' => 'auth'],function(){
    
    // Rute halaman Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // Akhir bagian halaman Dashboard

    // Rute Data pegawai
        Route::get('/pegawai/biodata', [PegawaiController::class, 'index'])->name('biodata.index');
        Route::get('/pegawai/biodata/create', [PegawaiController::class, 'create'])->name('biodata.create');
        Route::post('/pegawai/biodata/store', [PegawaiController::class, 'store'])->name('biodata.store');
        Route::get('/pegawai/biodata/edit{id}', [PegawaiController::class, 'edit'])->name('biodata.edit');
        Route::put('/pegawai/biodata/update{id}', [PegawaiController::class, 'update'])->name('biodata.update');
        Route::get('/pegawai/biodata/{id}/profile', [PegawaiController::class, 'profile'])->name('biodata.profile');
        Route::delete('/pegawai/biodata/delete{id}', [PegawaiController::class, 'destroy'])->name('biodata.destroy');
        //Akhir bagian halaman Biodata Pegawai


        //Akhir bagian halaman Riwayat Jabatan


        //Akhir bagian halaman Riwayat Pendidikan


        //Akhir bagian halaman Dokumen Pendukung

    //Rute Post Artikel
        Route::get('/post', [PostController::class, 'index'])->name('post.index');
});