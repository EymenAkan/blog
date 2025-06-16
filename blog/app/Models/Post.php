<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class,  'post_tag');
    }
}
