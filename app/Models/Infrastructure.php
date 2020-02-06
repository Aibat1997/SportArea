<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    protected $primaryKey = 'inf_id';
    protected $guarded = [];

    public function infrastructures()
    {
        return $this->belongsToMany('App\Models\Courts', 'court_infrastructures', 'ci_infrasructure_id', 'ci_court_id');
    }
}
