<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Partner
 *
 * @property $created_at
 * @property $partner_id
 * @property $brand_name
 * @property $address
 * @property $phone
 * @property $email
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Partner extends Model
{

    static $rules = [
        'username' => ['required', 'email'],
        'phone' => ['required', 'string'],
        'brand_name' => ['string'],
        'address' => ['string'],
        'updated_at' => ['numeric'],
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
        'updated_at',
    ];


}
