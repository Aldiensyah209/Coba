<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BintangKonveksi extends Model
{
    use HasFactory;

    protected $table = 'bintangkonveksi'; // Nama tabel yang sesuai dengan model ini

    protected $fillable = [
        'nama_bk',
        'harga_bk',
        'gambar_bk',
        'deskripsi_bk',
    ];
}
