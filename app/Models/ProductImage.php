<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable =['product_id','img_url'];
    
    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
