<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','subtitle','author','main_img_alt','main_image','description','blog_category_id','slug'
    ];
    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false)
        {
            $query->where('title','like','%'.request('search').'%')->orWhere('author','like','%'.request('search').'%');
        }
    }
    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

}
