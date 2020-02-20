<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\ComplexDiscount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ComplexDiscountController extends Controller
{
    public function storeDiscount(Request $request)
    {
        $validatedData = $request->validate([
            "cd_type" => "required",
            "dates" => "required",
            "times" => "required",
            "cd_pay_type" => "required",
            "cd_price" => "required",
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

        $complex_id = Auth::user()->complex()->first()->sc_id;

        $promocode = null;
        if ($request->cd_type == 2) {
            $promocode = Str::random(7);
        }

        ComplexDiscount::updateOrCreate(
            ['cd_complex_id' => $complex_id, 'cd_type' => $request->cd_type],
            [
                'cd_start_date' => $dates[0],
                'cd_finish_date' => $dates[1],
                'cd_start_time' => $times[0],
                'cd_finish_time' => $times[1],
                'cd_pay_type' => $request->cd_pay_type,
                'cd_price' => $request->cd_price,
                'cd_week_days' => $days,
                'cd_user_id' => $request->cd_user_id,
                'cd_hours' => $request->cd_hours,
                'cd_promocode' => $promocode
            ]
        );

        return redirect('/complex/'.$complex_id.'?tab=4')->withErrors(['Успешно сохранено!']);
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

    public function updateDiscount(Request $request)
    {
        $complex_id = Auth::user()->complex()->first()->sc_id;
        $discount = ComplexDiscount::find($request->c_id);
        $discount->update(['cd_status' => $request->cd_status]);
        return redirect('/complex/'.$complex_id.'?tab=4')->withErrors(['Успешно сохранено!']);
    }
}
