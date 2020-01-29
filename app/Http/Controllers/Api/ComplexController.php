<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SportComplex;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers;

class ComplexController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $result = Helpers::storeImg('image', 'image', $request);
        }else {
           return $request->image;
        }

        $complex = SportComplex::updateOrCreate(
            ['sc_id' => $request->sc_id],
            [
                'sc_city_id' => $request->city,
                'sc_sport_type_id' => $request->sport_type,
                'sc_creater_id' => $request->user_id,
                'sc_name' => $request->name,
                'sc_addres' => $request->address,
                'sc_work_time_weekday' => $request->time_weekday,
                'sc_work_time_weekend' => $request->time_weekend,
                'sc_phone' => $request->phone,
                'sc_show_phone' => $request->show_phone,
                'sc_description' => $request->description,
                'sc_accept_applications' => $request->accept_application,
                'sc_is_closed' => $request->close_complex,
                'sc_image' => 'asdfasdf'
            ]
        );
    }
}
