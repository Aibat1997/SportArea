<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courts extends Model
{
    protected $primaryKey = 'c_id';
    protected $guarded = [];

    public function infrastructures()
    {
        return $this->belongsToMany('App\Models\Infrastructure', 'court_infrastructures', 'ci_court_id', 'ci_infrasructure_id');
    }
}
