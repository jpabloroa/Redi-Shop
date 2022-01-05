<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseArticle
 *
 * @property $created_at
 * @property $article_id
 * @property $article_blob
 * @property $material_json
 * @property $sizes_json
 * @property $price
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BaseArticle extends Model
{
    
    static $rules = [
		'article_id' => 'required',
		'article_blob' => 'required',
		'material_json' => 'required',
		'sizes_json' => 'required',
		'price' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['article_id','article_blob','material_json','sizes_json','price'];



}
