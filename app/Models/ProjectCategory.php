<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $fillable = [

        'name',
        'slug'
    ];
    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false)
        {
            $query->where('name','like','%'.request('search').'%');
        }
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
