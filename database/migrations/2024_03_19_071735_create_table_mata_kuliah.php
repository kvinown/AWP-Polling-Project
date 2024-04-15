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
            $table->string('id', 10)->primary();
            $table->string('nama', 100);
            $table->integer('sks');
            $table->string('id_kurikulum', 10);
            $table->foreign('id_kurikulum')->references('id')->on('kurikulum')->onUpdate('cascade')->onDelete('restrict');
            $table->string('id_program_studi', 10);
            $table->foreign('id_program_studi')->references('id')->on('program_studi')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        \Illuminate\Support\Facades\DB::table('mata_kuliah')->insert([
            [
                'id' => 1,
                'nama' => 'Pemrograman Web Lanjut',
                'sks' => 4,
                'id_kurikulum' => 1,
                'id_program_studi' => 1,
            ],
            [
                'id' => 2,
                'nama' => 'Strategi Algoritmik',
                'sks' => 3,
                'id_kurikulum' => 1,
                'id_program_studi' => 1,
            ],
            [
                'id' => 3,
                'nama' => 'Basis Data Lanjut',
                'sks' => 3,
                'id_kurikulum' => 1,
                'id_program_studi' => 1,
            ],
            [
                'id' => 4,
                'nama' => 'Statistika',
                'sks' => 3,
                'id_kurikulum' => 1,
                'id_program_studi' => 1,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
