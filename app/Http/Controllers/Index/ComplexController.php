<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Api\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SportComplex;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers;
use Illuminate\Support\Facades\Validator;

class ComplexController extends Controller
{
    public function create()
    {
        return view('index.complex-create');
    }

    public function store(Request $request)
    {
        $response = new Response();
        $roles = [
            "sc_city_id" => "required",
            "sc_sport_type_id" => "required",
            "sc_creater_id" => "required",
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
        ];
        $validator = Validator::make($request->all(), $roles);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            $response->message = $error;
            return $response->json();
        }
        try {
            if ($request->hasFile('image')) {
                $result = Helpers::storeImg('image', 'image', $request);
            }
            SportComplex::create([
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
            $response->status = true;
            $response->message = 'Успешно сохранено';
        } catch (\Exception $e) {
            $response->message = $e->getMessage();
        }
        return $response->json();
    }
}
