<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('polling_detail', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->unsignedBigInteger('id_user');
            $table->string('id_mata_kuliah', 10);
            $table->string('id_polling', 10);
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_mata_kuliah')->references('id')->on('mata_kuliah')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_polling')->references('id')->on('polling')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('polling_detail');
    }
};
