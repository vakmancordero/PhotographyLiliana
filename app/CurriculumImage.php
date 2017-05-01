<?php

namespace App;

use App\Curriculum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CurriculumImage extends Model {
	
	protected $table = 'curriculum_image';
	
	protected $fillable = [
		'curriculum_id', 'name', 'path', 'order'
	];
	
	public $timestamps = false;
	
	protected $baseDir = 'images/articles';
	
	public function article() {
		return $this->belongsTo('App\Curriculum');
	}
	
	public static function build($name) {
		
		$image = new self;
		
		return $image->saveAs($name);
	}
	
	private function saveAs($name) {
		
		$this->name = sprintf("%s-%s", time(), $name);
		$this->path = sprintf("%s/%s", $this->baseDir, $this->name);
		
		return $this;
	}
	
	public function store(UploadedFile $file) {

        $file->move($this->baseDir, $this->name);

        return $this;
	}
	
	public function delete() {
        Storage::disk('curriculum')->delete('app/'.$this->path);
        Storage::disk('curriculum')->delete('computer/'.$this->path);
        Storage::disk('curriculum')->delete('mov/'.$this->path);
        Storage::disk('curriculum')->delete('tablet/'.$this->path);

		parent::delete();
	}


}
