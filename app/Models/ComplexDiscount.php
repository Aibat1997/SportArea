<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplexDiscount extends Model
{
    protected $primaryKey = 'cd_id';
    protected $guarded = [];

    public function setCdPromocodeAttribute($value)
    {
        $this->attributes['cd_promocode'] = strtoupper($value);
    }
}
