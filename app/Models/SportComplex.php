<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportComplex extends Model
{
    protected $primaryKey = 'sc_id';
    protected $guarded = [];

    public function sporttype()
    {
        return $this->belongsTo('App\Models\SportTypes');
    }

    public function courts()
    {
        return $this->hasMany('App\Models\Courts');
    }
}
