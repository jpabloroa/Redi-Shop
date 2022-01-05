<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 *
 * @property $created_at
 * @property $article_id
 * @property $creator_id
 * @property $article_blob
 * @property $base_article_id
 * @property $price
 * @property $stock
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Article extends Model
{
    
    static $rules = [
		'article_id' => 'required',
		'creator_id' => 'required',
		'article_blob' => 'required',
		'base_article_id' => 'required',
		'price' => 'required',
		'stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['article_id','creator_id','article_blob','base_article_id','price','stock'];



}
