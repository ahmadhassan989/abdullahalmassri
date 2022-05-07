<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{

    Use SoftDeletes;

    protected $fillable = ['title' ,'description', 'main_category_id'];

    public function maincategory()
    {
        return $this->belongsTo('App\Models\MainCategory','main_category_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
