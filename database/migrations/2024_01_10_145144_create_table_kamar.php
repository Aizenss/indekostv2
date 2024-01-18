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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kos_id');
            $table->bigInteger('user_id')->nullable(true);
            $table->string('nama_kamar');
            $table->json('fasilitas');
            $table->json('peraturan_kamar');
            $table->string('kamar_mandi');
            $table->json('foto_kamar');
            $table->string('harga');
            $table->integer('night')->max(12);
            $table->string('status')->default('kosong');
            $table->string('snap_token')->nullable(true);
            $table->json('result')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
