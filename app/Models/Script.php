<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','position','code','page_id','slug'
    ];
    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false)
        {
            $query->where('position','like','%'.request('search').'%')->orWhere('title','like','%'.request('search').'%')->orWhere(function($query) use ($filters) {
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
