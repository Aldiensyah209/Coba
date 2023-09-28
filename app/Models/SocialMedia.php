<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'social_media'; // Nama tabel yang sesuai dengan model ini

    protected $fillable = [
        'whatsapp',
        'instagram',
        'facebook',
        'tiktok',
        'isPriority',
    ];
}
