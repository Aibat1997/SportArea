<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportTypes extends Model
{
    protected $primaryKey = 'st_id';
    protected $guarded = [];

    public function complexes()
    {
        return $this->hasMany('App\Models\SportComplex', 'sc_sport_type_id', 'st_id');
    }
}
