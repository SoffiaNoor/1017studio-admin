<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagBerita extends Model
{
    use HasFactory;
    protected $table = 'berita_tag';

    public function tagBerita()
    {
        return $this->hasMany(Berita::class);
    }
}
