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

    public function complex()
    {
        return $this->belongsTo('App\Models\SportComplex', 'c_complex_id', 'sc_id');
    }

    public function sporttypes()
    {
        return $this->belongsToMany('App\Models\SportTypes', 'curt_sport_types', 'court_id', 'sport_type_id');
    }

    public function coverage()
    {
        return $this->belongsTo('App\Models\TypeCoverage', 'c_coverage_id', 'tc_id');
    }

    public function parts()
    {
        return $this->hasMany('App\Models\CourtsPart', 'cp_court_id', 'c_id');
    }
}
