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
        Schema::create('riwayat_kepegawaians', function (Blueprint $table) {
            $table->id('riwayat_kepegawaian_id');
            $table->foreignId('id_pegawai')->references('pegawai_id')->on('pegawais')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_riwayat_jabatan')->references('riwayat_jabatan_id')->on('riwayat_jabatans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_riwayat_golongan')->references('riwayat_golongan_id')->on('riwayat_golongans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_unit')->references('unit_id')->on('units')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_kepegawaians');
    }
};
