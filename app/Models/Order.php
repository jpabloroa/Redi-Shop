<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property $created_at
 * @property $order_id
 * @property $article_id
 * @property $creator_id
 * @property $value_added_taxes
 * @property $partner_id
 * @property $delivery_address
 * @property $delivery_information
 * @property $estimated_delivery_at
 * @property $delivered_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{

    static $rules = [
        'order_id' => ['required', 'string', 'max:255'],
        'article_id' => ['required', 'string', 'max:255'],
        'creator_id' => ['required', 'string', 'max:255'],
        'partner_id' => ['required', 'string', 'max:255'],
        'delivery_address' => ['required', 'string', 'max:255'],
        'delivery_information' => ['string', 'max:255'],
        'estimated_delivery_at' => ['required', 'string', 'max:255'],
        'delivered_at' => ['string', 'max:255'],
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'article_id',
        'creator_id',
        'value_added_taxes',
        'partner_id',
        'delivery_address',
        'delivery_information',
        'estimated_delivery_at',
        'delivered_at'
    ];


}
