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
        return view('index.object-inside', compact('complex'));
    }

    public function storeDiscount(Request $request)
    {
        $validatedData = $request->validate([
            "cd_type" => "required",
            "dates" => "required",
            "times" => "required",
            "cd_pay_type" => "required",
            "cd_price" => "required"
        ]);

        $dates = $this->divider($request->dates, ":");
        $times = $this->divider($request->times, "-");

        $days = null;
        if ($request->has('cd_week_days')) {
            foreach ($request->cd_week_days as $value) {
                $days .= $value . ",";
            }
            $days = substr($days, 0, -1);
        }

        ComplexDiscount::create([
            'cd_complex_id' => Auth::user()->complex()->first()->sc_id,
            'cd_type' => $request->cd_type,
            'cd_start_date' => $dates[0],
            'cd_finish_date' => $dates[1],
            'cd_start_time' => $times[0],
            'cd_finish_time' => $times[1],
            'cd_pay_type' => $request->cd_pay_type,
            'cd_price' => $request->cd_price,
            'cd_week_days' => $days,
            'cd_user_id' => $request->has('cd_user_id') ? $request->cd_user_id : null,
            'cd_hours' => $request->has('cd_hours') ? $request->cd_hours : null,

        ]);

        return 'Успешно сохранено!';
    }

    public function divider($data, $divide)
    {
        $time = str_replace(' ', '', $data);
        $pices = explode($divide, $time);
        $dates = array();
        foreach ($pices as $value) {
            array_push($dates, $value);
        }
        return $dates;
    }
}
