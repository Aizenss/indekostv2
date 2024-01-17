<?php

use App\Models\Kamar;
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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kamar_id')->constrained('kamar');
            $table->foreignId('owner_id')->constrained('users');
            $table->unsignedBigInteger('admin_id')->default(1);
            $table->integer('nominal_owner');
            $table->integer('nominal_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
