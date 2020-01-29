<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\SportTypes;
use App\Models\SportComplex;

class HelperController extends Controller
{
    public function city()
    {
        $cities = City::select('city_id', 'city_name')->orderBy('city_sort_num', 'asc')->get();
        $sport_type = SportTypes::select('st_id', 'st_name')->orderBy('st_sort_num', 'asc')->get();
        $last_complex_id = SportComplex::latest()->first();

        if (is_null($last_complex_id)) {
            $last_complex_id = 20;
        }else {
            $last_complex_id = $last_complex_id->sc_id + 30;
        }

        return response()->json([
            'cities' => $cities,
            'sport_type' => $sport_type,
            'last_id' => $last_complex_id
            ]);
    }
}
