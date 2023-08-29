<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baju extends Model
{
    use HasFactory;

    protected $table = 'baju'; // Nama tabel yang sesuai dengan model ini

    protected $fillable = [
        'nama_baju',
        'harga',
        'gambar_baju',
        'deskripsi',
    ];

    // Tambahan kode lainnya, seperti relasi dengan model lain, dapat ditambahkan di sini jika diperlukan
}
