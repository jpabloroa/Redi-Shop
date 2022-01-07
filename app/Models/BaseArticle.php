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
        'article_id' => ['required', 'string'],
        'article_blob' => ['image'],
        'specs_json' => ['json'],
        'sizes_json' => ['json'],
        'price' => ['numeric'],
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_id',
        'article_blob',
        'specs_json',
        'sizes_json',
        'price',
        'updated_at'
    ];
}
