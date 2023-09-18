<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni'; // Nama tabel yang sesuai dengan model ini

    protected $fillable = [
        'gambar',
        'keterangan',
    ];
}
