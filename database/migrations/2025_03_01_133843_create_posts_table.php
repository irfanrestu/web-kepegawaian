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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id'); 
            $table->foreignId('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade'); 
            $table->text('judul'); 
            $table->string('file_foto_post')->nullable(); 
            $table->text('isi_post');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
