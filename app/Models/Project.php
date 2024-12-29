<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=[
        'title','subtitle','image','alt','description','project_category_id','slug'
      ];
      
      public function projectCategory()
      {
          return $this->belongsTo(ProjectCategory::class);
      }
}
