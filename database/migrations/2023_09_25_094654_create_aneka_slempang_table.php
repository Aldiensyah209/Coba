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
        Schema::create('aneka_slempang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_as');
            $table->decimal('harga_as', 10, 2);
            $table->string('gambar_as');
            $table->text('deskripsi_as');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aneka_slempang');
    }
};
