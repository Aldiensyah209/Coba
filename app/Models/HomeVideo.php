<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeVideo extends Model
{
    use HasFactory;

    protected $table = 'home_video'; // Nama tabel yang sesuai dengan model ini

    protected $fillable = [
        'tautan',
    ];
}
