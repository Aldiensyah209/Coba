<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnekaSlempang extends Model
{
    use HasFactory;

    protected $table = 'aneka_slempang'; // Nama tabel yang sesuai dengan model ini

    protected $fillable = [
        'nama_as',
        'harga_as',
        'gambar_as',
        'deskripsi_as',
    ];
}
