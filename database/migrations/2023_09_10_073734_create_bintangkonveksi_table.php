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
        Schema::create('bintangkonveksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bk');
            $table->decimal('harga_bk', 10, 2);
            $table->string('gambar_bk');
            $table->text('deskripsi_bk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bintangkonveksi');
    }
};
