<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Creator
 *
 * @property $created_at
 * @property $username
 * @property $phone
 * @property $brand_name
 * @property $landing_conf_json
 * @property $location
 * @property $address
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Creator extends Model
{
    protected $attributes = [
        'brand_name' => 'mi-marca',
        'landing_conf_json' => '{}',
    ];

    static $rules = [
        'username' => ['required', 'string'],
        'phone' => ['required', 'string'],
        'icon' => ['image'],
        'brand_name' => ['string'],
        'address' => ['nullable'],
        'landing_conf_json' => ['json'],
        'location' => ['string'],
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'phone',
        'icon',
        'brand_name',
        'address',
        'landing_conf_json',
        'location',
    ];


}
