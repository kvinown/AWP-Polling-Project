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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string('id_mata_kuliah', 10)->primary();
            $table->string('nama_mata_kuliah', 100);
            $table->integer('sks');
            $table->string('id_kurikulum', 10);
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')->onUpdate('cascade')->onDelete('restrict');
            $table->string('id_program_studi', 10);
            $table->foreign('id_program_studi')->references('id_program_studi')->on('program_studi')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
