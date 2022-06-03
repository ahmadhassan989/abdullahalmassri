<?php

namespace App;

use Gabievi\Promocodes\Models\Promocode;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dispatchesEvents = [

        'registeraion' => \App\Events\checkoutWithoutRegisteration::class,
     
     ];

    public function contactus()
    {
        return $this->hasMany('App\Models\ContactUs', 'contact_us_id');
    }
    public function promocodes()
    {
        return $this->hasMany(Promocode::class , 'promocode_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('activeUser', function (Builder $builder) {
            $builder->where('status',1);
        });
       
    }
}
