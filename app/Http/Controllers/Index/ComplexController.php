<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SportComplex;
use App\Models\SportTypes;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers;
use Exception;

class ComplexController extends Controller
{
    public function create()
    {
        return view('index.complex-create');
    }

    public function showById(Request $request, SportTypes $sporttype)
    {
        $complexes = $sporttype->complexes()->get();
        return view('index.sport-inside', compact('complexes'));
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
            "sc_image" => "required"
        ]);

        try {
            if ($request->hasFile('sc_image')) {
                $result = Helpers::storeImg('sc_image', 'image', $request);
            }else {
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
                'sc_image' => $result
                ]
            );

            return response()->json([
                'status' => true,
                'message' => 'Успешно сохранено!',
                'content' => $complex->sc_id
            ]);
        } catch (Exception $e) {
            report($e);
            return $e->getMessage();
        }
    }
}
