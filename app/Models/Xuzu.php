<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xuzu extends Model
{
    use HasFactory;

    protected $table = 'xuzu'; // Nama tabel yang sesuai dengan model ini

    protected $fillable = [
        'nama',
        'harga',
        'gambar',
        'deskripsi',
    ];
}
