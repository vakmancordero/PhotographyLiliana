<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model {
	
	protected $table = 'curriculum';
	
	protected $fillable = [
		'name', 'description', 'image'
	];
	public $timestamps = false;
}
