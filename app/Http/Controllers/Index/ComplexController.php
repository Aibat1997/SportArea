<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SportComplex;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers;

class ComplexController extends Controller
{
    public function create()
    {
        return view('index.complex-create');
    }

    public function store(Request $request)
    {
        dd(true,$request->all());
        if ($request->hasFile('image')) {
            $result = Helpers::storeImg('image', 'image', $request);
        }

        $complex = SportComplex::create([
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
            'sc_image' => $result
        ]);

        return 'success';
    }
}
