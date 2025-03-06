<?php

use App\Models\Dokumen;
use App\Models\RiwayatJabatan;
use App\Models\RiwayatPendidikan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RiwayatKepegawaianController;
use App\Http\Controllers\RiwayatPendidikanController;
use App\Http\Controllers\DokumenController;


Route::get('/', function () {
    return view('homepage.index');
});
// Akhir bagian halaman homepage

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('login.postlogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('dashboard.logout');
// Akhir bagian halaman login

Route::group(['middleware' => 'auth'], function () {

    // Rute halaman Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // Akhir bagian halaman Dashboard

    // Rute Data Biodata pegawai Tab
    Route::get('/data_pegawai', [PegawaiController::class, 'index1'])->name('data_pegawai.index');

    // Rute Data Biodata pegawai
    Route::get('pegawai/biodata', [PegawaiController::class, 'index'])->name('biodata.index');
    Route::get('/pegawai/biodata/create', [PegawaiController::class, 'create'])->name('biodata.create');
    Route::post('/pegawai/biodata/store', [PegawaiController::class, 'store'])->name('biodata.store');
    Route::get('/pegawai/biodata/edit/{pegawai}', [PegawaiController::class, 'edit'])->name('biodata.edit');
    Route::put('/pegawai/biodata/{pegawai}', [PegawaiController::class, 'update'])->name('biodata.update');
    Route::get('/pegawai/biodata/profile{pegawai}', [PegawaiController::class, 'profile'])->name('biodata.profile');
    Route::delete('/pegawai/biodata/delete{pegawai}', [PegawaiController::class, 'destroy'])->name('biodata.destroy');
    Route::put('/pegawai/change-password', [PegawaiController::class, 'changePassword'])->name('pegawai.change-password');
    
    // Fitur exclusive untuk admin
    Route::middleware('admin')->group(function () {
        Route::put('/pegawai/{pegawai}/change-role', [PegawaiController::class, 'changeRole'])->name('pegawai.change-role');
    });

    //fitur exclusive admin dan pegawai konten
    Route::middleware('content')->group(function () {
    //Rute Post Artikel
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    });

    //Akhir bagian halaman Biodata Pegawai

    Route::get('/riwayat_Kepegawaian', [RiwayatKepegawaianController::class, 'index'])->name('riwayat_Kepegawaian.index');
    Route::get('/riwayat_Kepegawaian/create', [RiwayatKepegawaianController::class, 'create'])->name('riwayat_Kepegawaian.create');
    Route::post('/riwayat_Kepegawaian/store', [RiwayatKepegawaianController::class, 'store'])->name('riwayat_Kepegawaian.store');
    Route::get('/riwayat_Kepegawaian/edit{id}', [RiwayatKepegawaianController::class, 'edit'])->name('riwayat_Kepegawaian.edit');
    Route::put('/riwayat_Kepegawaian/update{id}', [RiwayatKepegawaianController::class, 'update'])->name('riwayat_Kepegawaian.update');
    Route::delete('/riwayat_Kepegawaian/delete{id}', [RiwayatKepegawaianController::class, 'destroy'])->name('riwayat_Kepegawaian.destroy');
    //Akhir bagian halaman Riwayat Kepegawaian

    Route::get('/riwayat_pendidikan', [RiwayatPendidikanController::class, 'index'])->name('riwayat_pendidikan.index');
    Route::get('/riwayat_pendidikan/create', [RiwayatPendidikanController::class, 'create'])->name('riwayat_pendidikan.create');
    Route::post('/riwayat_pendidikan/store', [RiwayatPendidikanController::class, 'store'])->name('riwayat_pendidikan.store');
    Route::get('/riwayat_pendidikan/edit{id}', [RiwayatPendidikanController::class, 'edit'])->name('riwayat_pendidikan.edit');
    Route::put('/riwayat_pendidikan/update{id}', [RiwayatPendidikanController::class, 'update'])->name('riwayat_pendidikan.update');
    Route::delete('/riwayat_pendidikan/delete{id}', [RiwayatPendidikanController::class, 'destroy'])->name('riwayat_pendidikan.destroy');
    //Akhir bagian halaman Riwayat Pendidikan

    Route::get('/dokumen_pendukung', [DokumenController::class, 'index'])->name('dokumen_pendukung.index');
    Route::put('/dokumen_pendukung/update/{id}', [DokumenController::class, 'update'])->name('dokumen_pendukung.update');
    Route::delete('/dokumen_pendukung/delete{id}', [DokumenController::class, 'destroy'])->name('dokumen_pendukung.destroy');
    //Akhir bagian halaman Dokumen Pendukung

    
});