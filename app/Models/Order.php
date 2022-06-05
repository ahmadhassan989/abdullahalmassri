<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['phone', 'price', 'has_discount',
                        'amount', 'cart_id', 'payment_details_id'];

    // public function carts()
    // {
    //     return $this->hasOne()
    // }

    // public function payments(  )
    // {
    //     return $this->hasOne()
    // }
}
