<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'curriculum';

    protected $fillable = [
        'name', 'description', 'image','date','gallery'
    ];
}
