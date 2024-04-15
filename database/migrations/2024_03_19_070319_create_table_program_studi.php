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
        Schema::create('program_studi', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('nama', 100);
            $table->string('id_fakultas', 10);
            $table->foreign('id_fakultas')->references('id')->on('fakultas')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        \Illuminate\Support\Facades\DB::table('program_studi')->insert([
            [
                'id' => 1,
                'nama' => 'Teknik Informatika',
                'id_fakultas' => 1
            ],
            [
                'id' => 2,
                'nama' => 'Sistem Informasi',
                'id_fakultas' => 1
            ],
            [
                'id' => 3,
                'nama' => 'Elektro',
                'id_fakultas' => 2
            ],
            [
                'id' => 4,
                'nama' => 'Industri',
                'id_fakultas' => 2
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studi');
    }
};
