<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','slug'
    ];
   
     //Relation with script
     public function script()
     {
         return $this->hasMany(Script::class);
     }
     //Relation with tags
     public function tag()
     {
         return $this->hasOne(Tag::class);
     }
     //Relation with opengraph
     public function openGraph()
     {
         return $this->hasOne(OpenGraph::class);
     }
     //Relation with twitter card
     public function twitter()
     {
         return $this->hasOne(TwitterCard::class);
     }
}
