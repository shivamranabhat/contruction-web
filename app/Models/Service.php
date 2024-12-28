<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=[
      'description','service_category_id','slug'
    ];
    
    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
