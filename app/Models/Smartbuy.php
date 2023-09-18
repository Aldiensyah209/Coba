<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smartbuy extends Model
{
    use HasFactory;
    protected $table = 'smartbuy'; // Nama tabel yang sesuai dengan model ini

    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
    ];
}
