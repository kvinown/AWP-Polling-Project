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
        Schema::create('akun', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('nama', 100);
            $table->string('email')->unique();
            $table->string('password', 20);
            $table->string('id_role', 10);
            $table->foreign('id_role')->references('id_role')->on('role')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_akun');
    }
};
