<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio';

    protected $fillable = [
        'name',
        'jenis_tag_id',
        'image',
        'description',
    ];

}
