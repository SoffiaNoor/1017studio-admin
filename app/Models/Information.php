<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'information';

    protected $fillable = [
        'logo_header',
        'logo_favicon',
        'logo_company',
        'name',
        'image',
        'slogan',
        'description',
        'address',
        'email',
        'instagram',
        'facebook',
        'twitter',
        'phone',
        'google_map',
        'link_wa',
        'order_wa',
        'website_link',
    ];
}
