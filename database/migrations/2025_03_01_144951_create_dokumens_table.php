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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id('dokumen_id');
            $table->foreignId('id_pegawai')->references('pegawai_id')->on('pegawais')->onUpdate('cascade')->onDelete('cascade'); 
            $table->foreignId('id_kategori_dokumen')->references('kategori_dokumen_id')->on('kategori_dokumens')->onUpdate('cascade')->onDelete('cascade'); 
            $table->string('file_dokumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
