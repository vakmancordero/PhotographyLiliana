<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumImage extends Model {
	
	protected $table = 'curriculum_image';
	
	protected $fillable = [
		'curriculum_id', 'image', 'order'
	];
    
}
