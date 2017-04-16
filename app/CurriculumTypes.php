<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumTypes extends Model
{
    protected $fillable = [
        'type', 'order'
    ];

    protected $table = 'curriculum_types';

    public $timestamps = false;
}
