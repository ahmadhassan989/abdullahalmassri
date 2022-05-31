<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    protected $fillable = ['code','reward', 'remaining_quantity', 'total_quantity', 'expires_at'];

    protected $casts = [
        'quantity' => 'integer'
    ];

    protected $dates = ['expires_at'];

    public function users()
    {
        return $this->belongsToMany(config('promocodes.user_model'), config('promocodes.relation_table'),
        config('promocodes.foreign_pivot_key', 'user_id'), config('promocodes.related_pivot_key', 'user_id'))
        ->withPivot('used_at');
    }

    protected static function boot()
{
        parent::boot();

        static::addGlobalScope('validPromocode', function (Builder $builder) {
            $builder->where('expires_at', '>=' ,Carbon::now())
            ->where('remaining_quantity' ,'>', 0);
        });
       
    }
}
