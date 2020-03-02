<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Infrastructure;
use App\Models\SportComplex;
use App\Models\SportTypes;
use App\Models\TypeCoverage;
use App\Models\Courts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HelperController extends Controller
{
    public function informations(Request $request)
    {
        $cities = City::select('city_id', 'city_name')->orderBy('city_sort_num', 'asc')->get();
        $sport_type = SportTypes::select('st_id', 'st_name')->orderBy('st_sort_num', 'asc')->get();
        $status = false;

        if (!empty($request->complex) && $request->complex > 0) {
            $complex = SportComplex::where('sc_id', $request->complex)
                ->select(
                    'sc_id',
                    'sc_city_id',
                    'sc_name',
                    'sc_addres',
                    'sc_work_time_weekday',
                    'sc_work_time_weekend',
                    'sc_phone',
                    'sc_show_phone',
                    'sc_description',
                    'sc_accept_applications',
                    'sc_is_closed',
                    'sc_image'
                )->first();

            $status = true;
        } else {
            $complex = new SportComplex();
        }

        $type_coverages = TypeCoverage::orderBy('tc_sort_num', 'asc')->select('tc_id', 'tc_name')->get();
        $infrastructures = Infrastructure::orderBy('inf_sort_num', 'asc')->select('inf_id', 'inf_name')->get();

        return response()->json([
            'cities' => $cities,
            'sport_type' => $sport_type,
            'type_coverages' => $type_coverages,
            'infrastructures' => $infrastructures,
            'complex' => $complex,
            'status' => $status,
        ]);
    }

    public function inventory()
    {
        $inventories = Auth::user()->complex()
            ->first()
            ->inventories()
            ->select('inv_id', 'inv_cost', 'inv_name', 'inv_is_active')
            ->get();
        return $inventories;
    }

    public function courts(Request $request)
    {
        $courts = Courts::where('c_complex_id', $request->complex)
            ->select('c_id', 'c_complex_id', 'c_coverage_id', 'c_name', 'c_open_field', 'c_images', 'c_cost', 'c_prepayment', 'c_prepayment_type', 'c_area', 'c_is_purtable')
            ->groupBy('courts.c_id')
            ->get();

        $data = array();

        foreach ($courts as $key => $value) {
            $court_images = array();
            $images = explode(",", $value->c_images);
            foreach ($images as $item) {
                $result = base64_decode(Storage::disk('court_image')->get($item));
                array_push($court_images, $result);
            }
            $data[$key] = $value;
            $data[$key]['part_count'] = $value->parts->count('cp_court_id');
            $data[$key]['c_images'] = $court_images;
            $data[$key]['infrastructury'] = $value->infrastructures()->select('inf_id', 'inf_name')->get();
            $data[$key]['c_sport_type'] = $value->sporttypes()->select('st_id', 'st_name')->get();
        }

        return $data;
    }
}
