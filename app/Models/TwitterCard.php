<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwitterCard extends Model
{
    use HasFactory;
    protected $fillable=[
        'tag_name',
        'site',
        'title',
        'description',
        'image',
        'page_id',
        'summary',
        'slug',
    ];
    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false)
        {
            $query->where('tag_name','like','%'.request('search').'%')->orWhere(function($query) use ($filters) {
                $query->whereHas('page', function($query) use ($filters) {
                    $query->where('name', 'like', '%'.$filters['search'].'%');
                });
            });
        }
    }
    //Relation with page
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
