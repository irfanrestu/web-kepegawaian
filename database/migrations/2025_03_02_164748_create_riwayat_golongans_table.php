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
        Schema::create('riwayat_golongans', function (Blueprint $table) {
            $table->id('riwayat_golongan_id');
            $table->string('pangkat_golongan');
            $table->string('jenis_kenaikan')->nullable();
            $table->string('masa_kerja_tahun')->nullable();
            $table->string('masa_kerja_bulan')->nullable();
            $table->date('tmt_awal')->nullable();
            $table->date('tmt_akhir')->nullable();
            $table->integer('perjanjian_ke')->nullable();
            $table->string('status_perjanjian')->nullable();
            $table->string('dokumen_sk')->nullable();
            $table->string('dokumen_perjanjian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_golongans');
    }
};
