<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
        protected $fillable = ['title', 'description' ,'price','status' ,'sku'];


    public function boxImages()
    {
    return $this->hasMany('App\Models\ImageBox');
    }

    public function products()
    {
    return $this->hasMany('App\Models\ProductBox','box_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('activeBox', function (Builder $builder) {
            $builder->where('status',1);
        });
    
    }
}