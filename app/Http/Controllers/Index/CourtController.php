<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use App\Models\Courts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class CourtController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "c_name" => "required",
            "infrastructures" => "required",
            "c_open_field" => "required",
            "c_coverage_id" => "required",
            "c_cost" => "required",
            "c_prepayment" => "required",
            "c_prepayment_type" => "required",
            "c_area" => "required",
            "files" => "required",
        ]);

        try {
            if ($request->hasFile('files')) {
                $result = Helpers::storeImages('files', 'image', $request);
            }

            $court = Courts::create(
                [
                    "c_complex_id" => Auth::user()->complex()->first()->sc_id,
                    "c_name" => $request->c_name,
                    "c_open_field" => $request->c_open_field,
                    "c_coverage_id" => $request->c_coverage_id,
                    "c_cost" => $request->c_cost,
                    "c_prepayment" => $request->c_prepayment,
                    "c_prepayment_type" => $request->c_prepayment_type,
                    "c_area" => $request->c_area,
                    "c_images" => $result,
                ]
            );

            $list = array();
            foreach ($request->infrastructures as $value) {
                array_push($list, $value);
            }

            $court->infrastructures()->sync($list);

            return response()->json([
                'status' => true,
                'message' => 'Успешно сохранено!',
            ]);
        } catch (Exception $e) {
            report($e);
            return $e->getMessage();
        }
    }

    public function delete(Request $request)
    {
        Courts::where('c_id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Успешно сохранено!',
        ]);
    }
}
