<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Image extends Model {
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = "article_images";
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'path',
		'thumbnail_path',
	];
	
	/**
	 * The directory where images are stored.
	 *
	 * @var string
	 */
	protected $baseDir = 'images/articles';
	
	/**
	 * Gets the article that owns the image.
	 *
	 * @return BelongsTo
	 */
	public function article() {
		
		return $this->belongsTo('App\Article');
	}
	
	/**
	 * Builds a new image instance.
	 *
	 * @param string $name
	 * @return Image
	 */
	public static function build($name) {
		
		$image = new self;
		
		return $image->saveAs($name);
	}
	
	/**
	 * Sets the properties.
	 *
	 * @param string $name
	 * @return $this
	 */
	private function saveAs($name) {
		
		$this->name = sprintf("%s-%s", time(), $name);
		$this->path = sprintf("%s/%s", $this->baseDir, $this->name);
		
		return $this;
	}
	
	/**
	 * Moves the uploaded file to a new location.
	 *
	 * @param UploadedFile $file
	 * @return $this
	 */
	public function store(UploadedFile $file) {
		
		$file->move($this->baseDir, $this->name);
		
		return $this;
	}
	
	/**
	 *
	 * @throws \Exception
	 */
	public function delete() {
		
		File::delete([
			$this->path,
		]);
		
		parent::delete();
	}
	
}
