<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('pegawai_id');
            $table->string('nama_lengkap');
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('file_foto')->nullable();
            $table->string('nip')->unique();
            $table->string('npwp')->nullable();
            $table->string('no_karpeg')->nullable();
            $table->string('no_bpjs')->nullable();
            $table->string('no_kartu_keluarga')->nullable();
            $table->string('no_nik')->unique();
            $table->foreignId('id_status_pegawai')->references('status_pegawai_id')->on('status_pegawais')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->foreignId('id_agama')->references('agama_id')->on('agamas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->text('alamat_lengkap');
            $table->string('rt');
            $table->string('rw');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota_kabupaten');
            $table->string('kode_pos');
            $table->string('homebase');
            //$table->foreignId('id_golongan')->references('golongan_id')->on('golongans')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
