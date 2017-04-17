<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	
	use SoftDeletes;
	
	/**
	 * Soft deleted articles still exist in the table.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'name',
		'country',
		'price',
		'description'
	];
	
	/**
	 * Gets the images for the article.
	 *
	 * @return HasMany
	 */
	public function images()
	{
		return $this->hasMany('App\Image');
	}
	
	/**
	 * Gets the user that owns the article.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function owner()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	
	/**
	 * Retrieves the first article by the given ID.
	 *
	 * @param int $id
	 * @return mixed
	 */
	public static function getOne($id)
	{
		return self::where(compact('id'))->firstOrFail();
	}
	
	/**
	 * Formats the price.
	 *
	 * This method defines a mutator for the price attribute.
	 * This mutator will be automatically called when we attempt
	 * to set the value of the price attribute on the model.
	 *
	 * @param float $price
	 * @return string
	 */
	public static function getPriceAttribute($price)
	{
		return '$' . number_format($price, 2);
	}
	
	/**
	 * Saves the image to the database.
	 *
	 * @param Image $img
	 * @return Model
	 */
	public function saveImage(Image $img)
	{
		return $this->images()->save($img);
	}
	
	/**
	 * Determines if the given user created the article.
	 *
	 * @param User $user
	 * @return bool
	 */
	public function ownedBy(User $user)
	{
		return $this->user_id == $user->id;
	}
}
