<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportComplex extends Model
{
    protected $primaryKey = 'sc_id';
    protected $guarded = [];

    protected $attributes = [
        'sc_city_id' => "default",
        'sc_sport_type_id' => "default",
        'sc_show_phone' => false,
        'sc_accept_applications' => false,
        'sc_is_closed' => false
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'sc_city_id', 'city_id');
    }

    public function sporttype()
    {
        return $this->belongsTo('App\Models\SportTypes');
    }

    public function courts()
    {
        return $this->hasMany('App\Models\Courts', 'c_complex_id', 'sc_id');
    }

    public function inventories()
    {
        return $this->hasMany('App\Models\Inventory', 'inv_complex_id', 'sc_id');
    }
    public function cheapCourt()
    {
        return $this->hasMany('App\Models\Courts', 'c_complex_id', 'sc_id')->orderBy('c_cost');
    }
}
