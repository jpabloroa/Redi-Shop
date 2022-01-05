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
		'partner_id' => 'required',
		'brand_name' => 'required',
		'address' => 'required',
		'phone' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['partner_id','brand_name','address','phone','email'];



}
