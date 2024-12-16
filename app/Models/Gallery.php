<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable=[
       'image',
       'slug',
    ];
    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false)
        {
            $query->where('image','like','%'.request('search').'%');
        }
    }
}
