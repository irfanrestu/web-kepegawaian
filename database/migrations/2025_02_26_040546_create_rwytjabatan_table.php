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
        Schema::create('rwytjabatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan');
            $table->string('satuan_kerja');
            $table->date('tmt_jabatan');
            $table->string('nama_file', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rwytjabatan');
    }
};
