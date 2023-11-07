<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita'; // Nama tabel yang sesuai dengan model ini

    protected $fillable = [
        'gambar',
        'judul',
        'tautan',
    ];
}
