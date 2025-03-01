<?php

use App\Models\RiwayatJabatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RiwayatJabatanController;


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

    // Rute Data pegawai
    Route::get('/pegawai/biodata', [PegawaiController::class, 'index'])->name('biodata.index');
    Route::get('/pegawai/biodata/create', [PegawaiController::class, 'create'])->name('biodata.create');
    Route::post('/pegawai/biodata/store', [PegawaiController::class, 'store'])->name('biodata.store');
    Route::get('/pegawai/biodata/edit{id}', [PegawaiController::class, 'edit'])->name('biodata.edit');
    Route::put('/pegawai/biodata/update{id}', [PegawaiController::class, 'update'])->name('biodata.update');
    Route::get('/pegawai/biodata/{id}/profile', [PegawaiController::class, 'profile'])->name('biodata.profile');
    Route::delete('/pegawai/biodata/delete{id}', [PegawaiController::class, 'destroy'])->name('biodata.destroy');
    //Akhir bagian halaman Biodata Pegawai

    Route::get('/riwayat_jabatan', [RiwayatJabatanController::class, 'index'])->name('riwayat_jabatan.index');
    Route::get('/riwayat_jabatan/create', [RiwayatJabatanController::class, 'create'])->name('riwayat_jabatan.create');
    Route::post('/riwayat_jabatan/store', [RiwayatJabatanController::class, 'store'])->name('riwayat_jabatan.store');
    Route::get('/riwayat_jabatan/edit{id}', [RiwayatJabatanController::class, 'edit'])->name('riwayat_jabatan.edit');
    Route::put('/riwayat_jabatan/update{id}', [RiwayatJabatanController::class, 'update'])->name('riwayat_jabatan.update');
    Route::delete('/riwayat_jabatan/delete{id}', [RiwayatJabatanController::class, 'destroy'])->name('riwayat_jabatan.destroy');
    //Akhir bagian halaman Riwayat Jabatan

    Route::get('/riwayat_pendidikan', [RiwayatJabatanController::class, 'index'])->name('riwayat_pendidikan.index');
    Route::get('/riwayat_pendidikan/create', [RiwayatJabatanController::class, 'create'])->name('riwayat_pendidikan.create');
    Route::post('/riwayat_pendidikan/store', [RiwayatJabatanController::class, 'store'])->name('riwayat_pendidikan.store');
    Route::get('/riwayat_pendidikan/edit{id}', [RiwayatJabatanController::class, 'edit'])->name('riwayat_pendidikan.edit');
    Route::put('/riwayat_pendidikan/update{id}', [RiwayatJabatanController::class, 'update'])->name('riwayat_pendidikan.update');
    Route::delete('/riwayat_pendidikan/delete{id}', [RiwayatJabatanController::class, 'destroy'])->name('riwayat_pendidikan.destroy');
    //Akhir bagian halaman Riwayat Pendidikan

    Route::get('/dokumen_pendukung', [RiwayatJabatanController::class, 'index'])->name('dokumen_pendukung.index');
    Route::get('/dokumen_pendukung/create', [RiwayatJabatanController::class, 'create'])->name('dokumen_pendukung.create');
    Route::post('/dokumen_pendukung/store', [RiwayatJabatanController::class, 'store'])->name('dokumen_pendukung.store');
    Route::get('/dokumen_pendukung/edit{id}', [RiwayatJabatanController::class, 'edit'])->name('dokumen_pendukung.edit');
    Route::put('/dokumen_pendukung/update{id}', [RiwayatJabatanController::class, 'update'])->name('dokumen_pendukung.update');
    Route::delete('/dokumen_pendukung/delete{id}', [RiwayatJabatanController::class, 'destroy'])->name('dokumen_pendukung.destroy');
    //Akhir bagian halaman Dokumen Pendukung

    //Rute Post Artikel
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
});