<?php

namespace App\Models;

    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable =['main_category_id', 'sub_category_id', 'product_unit_id',
        'product_name', 'product_slug', 'price', 'sku', 'product_description', 'img_url'];

    public function mainCategory()
    {
        return $this->belongsTo('App\Models\MainCategory','main_category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo('App\Models\SubCategory', 'sub_category_id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit', 'product_unit_id');
    }

    public function productimgs()
    {
        return $this->hasMany(ProductImage::class);
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }


}
