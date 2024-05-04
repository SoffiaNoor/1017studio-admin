<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';

    protected $fillable = [
        'berita_tag',
        'berita_tag_id',
        'berita_tag_id_2',
        'title',
        'description',
        'photo',
        'author',
    ];
}

