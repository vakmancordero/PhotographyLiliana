<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model {
	
	protected $table = 'curriculum';
	
	protected $fillable = [
		'name', 'description', 'image'
	];
	
	public $timestamps = false;
	
	public function curriculumImages() {
		return $this->hasMany('App\CurriculumImage');
	}
	
	public static function getOne($id) {
		return self::where(compact('id'))->firstOrFail();
	}
	
	public function saveImage(CurriculumImage $img) {
		return $this->curriculumImages()->save($img);
	}
	
}
