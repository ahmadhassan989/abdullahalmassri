<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    protected $primaryKey = 'code';
    protected $foreign_key = 'id';
    public $incrementing = false;
    protected $fillable = ['code','reward', 'remaining_quantity', 'total_quantity', 'expires_at'];

    protected $casts = [
        'quantity' => 'integer'
    ];

    protected $dates = ['expires_at'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    protected static function boot()
{
        parent::boot();

        static::addGlobalScope('validPromocode', function (Builder $builder) {
            $builder->where('expires_at', '>=' ,Carbon::now());
        });

    }
}
