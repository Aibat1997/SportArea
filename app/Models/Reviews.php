<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $primaryKey = 'r_complex_id';
    protected $guarded = [];

    public function author()
    {
        return $this->hasOne('App\Models\User', 'user_id', 'r_user_id');
    }
}
