<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use App\Models\ComplexDiscount;
use App\Models\SportComplex;
use App\Models\SportTypes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Courts;

class ComplexController extends Controller
{
    public function create()
    {
        return view('index.complex-create');
    }

    public function showById(Request $request, SportTypes $sporttype)
    {
        $courts = Courts::select(\DB::raw("MIN(c_cost) AS min_price"), 'c_complex_id')->groupBy('c_complex_id')->get();
        $complexes = $sporttype->complexes;
        $complexes_id = array();
        if ($request->has('by_price')) {
            foreach ($complexes as $key => $value) {
                dd($value->cheapCourt->first());
            }
        }
        if ($request->has('city')) {
            $complexes->where('sc_city_id', $request->city);
        }
        if ($request->has('is_open')) {
            $complexes->where('c_open_field', $request->is_open);
        }
        if ($request->has('coverage')) {
            $complexes->where('c_coverage_id', $request->coverage);
        }
        if ($request->has('cost_from')) {
            $complexes->where('c_cost', '>=', $request->cost_from);
        }
        if ($request->has('cost_to')) {
            $complexes->where('c_cost', '<=', $request->cost_to);
        }

        $complexes->get();
        
        return view('index.sport-inside', compact('complexes', 'sporttype'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "sc_city_id" => "required",
            "sc_sport_type_id" => "required",
            "sc_name" => "required",
            "sc_addres" => "required",
            "sc_work_time_weekday" => "required",
            "sc_work_time_weekend" => "required",
            "sc_phone" => "required",
            "sc_show_phone" => "required",
            "sc_description" => "required",
            "sc_accept_applications" => "required",
            "sc_is_closed" => "required",
            "sc_image" => "required",
        ]);

        try {
            if ($request->hasFile('sc_image')) {
                $result = Helpers::storeImg('sc_image', 'image', $request);
            } else {
                $result = $request->sc_image;
            }

            $complex = SportComplex::updateOrCreate(
                ['sc_creater_id' => Auth::user()->user_id],
                [
                    'sc_city_id' => $request->sc_city_id,
                    'sc_sport_type_id' => $request->sc_sport_type_id,
                    'sc_name' => $request->sc_name,
                    'sc_addres' => $request->sc_addres,
                    'sc_work_time_weekday' => $request->sc_work_time_weekday,
                    'sc_work_time_weekend' => $request->sc_work_time_weekend,
                    'sc_phone' => $request->sc_phone,
                    'sc_show_phone' => $request->sc_show_phone == 'false' || $request->sc_show_phone == '0' ? 0 : 1,
                    'sc_description' => $request->sc_description,
                    'sc_accept_applications' => $request->sc_accept_applications == 'false' || $request->sc_accept_applications == '0' ? 0 : 1,
                    'sc_is_closed' => $request->sc_is_closed == 'false' || $request->sc_is_closed == '0' ? 0 : 1,
                    'sc_image' => $result,
                ]
            );

            return response()->json([
                'status' => true,
                'message' => 'Успешно сохранено!',
                'content' => $complex->sc_id,
            ]);
        } catch (Exception $e) {
            report($e);
            return $e->getMessage();
        }
    }

    public function infoById(SportComplex $complex)
    {
        $complex_id = Auth::user()->complex()->first()->sc_id;
        $discounts = ComplexDiscount::where('cd_complex_id', $complex_id)->get();
        return view('index.object-inside', compact('complex', 'discounts'));
    }
}
