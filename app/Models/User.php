<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Models\FavoriteField;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    public function complex()
    {
        return $this->hasOne('App\Models\SportComplex', 'sc_creater_id', 'user_id');
    }

    public function isFavorite($complex_id)
    {
        return FavoriteField::where([
            ['ff_complex_id', $complex_id],
            ['ff_user_id', $this->user_id],
        ])->exists();
    }

    public function favorites()
    {
        return $this->belongsToMany('App\Models\FavoriteField', 'favorite_fields', 'ff_user_id', 'ff_complex_id');
    }

    public function favoriteFields()
    {
        return FavoriteField::where('ff_user_id', $this->user_id)
        ->leftJoin('sport_complexes as complex', 'favorite_fields.ff_complex_id', '=', 'complex.sc_id')      
        ->get();
    }
}
