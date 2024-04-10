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
        Schema::create('polling_detail', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('id_user', 10);
            $table->string('id_mata_kuliah', 10);
            $table->string('id_polling', 10);
            $table->foreign('id_user')->references('id')->on('akun')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_mata_kuliah')->references('id')->on('mata_kuliah')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_polling')->references('id')->on('polling')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_polling_detail');
    }
};
