<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about'; // Nama tabel yang sesuai dengan model ini

    protected $fillable = [
        'judul',
        'deskripsi',
    ];
}
