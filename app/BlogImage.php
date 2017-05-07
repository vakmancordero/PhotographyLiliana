<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    protected $table = 'blog_image';

    protected $fillable = [
        'blog_id', 'path', 'order'
    ];
}
}
