<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['tags'];

    public function tags()
    {
        return $this->hasMany(Post::class);
    }

}
