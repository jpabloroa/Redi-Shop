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

    static $rules = [
        'username' => ['required', 'email'],
        'phone' => ['required', 'numeric'],
        'icon' => ['image'],
        'brand_name' => ['string'],
        'address' => ['string'],
        'landing_conf_json' => ['string'],
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
        'brand_name',
        'address',
        'landing_conf_json',
        'location',
    ];


}
