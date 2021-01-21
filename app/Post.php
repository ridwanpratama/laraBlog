<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ['author', 'content', 'title', 'image', 'slug', 'tags_id'];

    public function tags()
    { 
        return $this->belongsTo(Tag::class);
    }

}
