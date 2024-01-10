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
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id');
            $table->string('nama_kost');
            $table->string('ketentuan');
            $table->string('lokasi');
            $table->string('spesifikasi');
            $table->integer('harga');
            $table->json('fasilitas_kamar');
            $table->string('peraturan');
            $table->string('fasilitas_kamar_mandi');
            $table->string('fasilitas_tempat_parkir');
            $table->string('status')->default('pending');
            $table->string('foto_depan');
            $table->string('foto_dalam');
            $table->json('foto_tambahan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosts');
    }
};
