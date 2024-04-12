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
        Schema::create('role', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('nama', 10);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        \Illuminate\Support\Facades\DB::table('role')->insert([
            [
                'id' => 1,
                'nama' => 'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'nama' => 'User',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
};
