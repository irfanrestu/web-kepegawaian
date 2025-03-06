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
        Schema::create('riwayat_jabatans', function (Blueprint $table) {
            $table->id('riwayat_jabatan_id');
            $table->foreignId('id_jenis_jabatan')->references('jenis_jabatan_id')->on('jenis_jabatans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_jabatan');
            $table->date('tmt_jabatan');
            $table->string('status_jabatan');
            $table->string('dokumen_jabatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_jabatans');
    }
};
