<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_pendidikans', function (Blueprint $table) {
            $table->id('riwayat_pendidikan_id');
            $table->foreignId('id_pegawai')->references('pegawai_id')->on('pegawais')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_jenjang_pendidikan')->references('jenjang_pendidikan_id')->on('jenjang_pendidikans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_jurusan')->references('jurusan_id')->on('jurusans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_sekolah');
            $table->string('file_ijazah')->nullable();
            $table->string('file_transkrip')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pendidikans');
    }
};
