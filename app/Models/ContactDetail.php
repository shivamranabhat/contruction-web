<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'phone',
        'email',
        'facebook_link',
        'insta_link',
        'youtube_link',
        'whatsapp_link',
        'slug'
    ];
}
