<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use App\Models\Courts;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CourtController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "c_name" => "required",
            "infrastructury" => "required",
            "c_open_field" => "required",
            "c_coverage_id" => "required",
            "c_cost" => "required",
            "c_prepayment" => "required",
            "c_prepayment_type" => "required",
            "c_area" => "required",
            "c_images" => "required",
        ]);

        try {
            $result = Helpers::storeBase64Images('c_images', 'court_image', $request);

            $court = Courts::create(
                [
                    "c_complex_id" => $request->c_complex_id,
                    "c_name" => $request->c_name,
                    "c_open_field" => $request->c_open_field,
                    "c_coverage_id" => $request->c_coverage_id,
                    "c_cost" => $request->c_cost,
                    "c_prepayment" => $request->c_prepayment,
                    "c_prepayment_type" => $request->c_prepayment_type,
                    "c_area" => $request->c_area,
                    "c_images" => $result,
                    "c_is_purtable" => $request->c_is_purtable == 'true' || $request->c_is_purtable == 1 ? 1 : 0
                ]
            );

            if ($request->c_is_purtable == 'true' || $request->c_is_purtable == 1){
                DB::table('curt_part')->where('cp_court_id', $court->c_id)->delete();
                $count = (int)$request->part_count;
                for ($i = 1; $i<=$count; $i++){
                    DB::table('curt_part')->insert(['cp_court_id' => $court->c_id]);
                }
            }

            $list = array();
            foreach ($request->infrastructury as $value) {
                array_push($list, $value['inf_id']);
            }

            $court->infrastructures()->sync($list);

            $list = array();
            foreach ($request->c_sport_type as $value) {
                array_push($list, $value['st_id']);
            }

            $court->sporttypes()->sync($list);

            return response()->json([
                'status' => true,
                'message' => 'Успешно сохранено!',
            ]);
        } catch (Exception $e) {
            report($e);
            return $e->getMessage();
        }
    }

    public function update(Request $request, Courts $court)
    {
        $validatedData = $request->validate([
            "c_id" => "required",
            "c_name" => "required",
            "infrastructury" => "required",
            "c_open_field" => "required",
            "c_coverage_id" => "required",
            "c_cost" => "required",
            "c_prepayment" => "required",
            "c_prepayment_type" => "required",
            "c_area" => "required",
            "c_images" => "required",
        ]);

        try {
            $court = Courts::find($request->c_id);
            $result = Helpers::storeBase64Images('c_images', 'court_image', $request);

            $court->update(
                [
                    "c_name" => $request->c_name,
                    "c_open_field" => $request->c_open_field,
                    "c_coverage_id" => $request->c_coverage_id,
                    "c_cost" => $request->c_cost,
                    "c_prepayment" => $request->c_prepayment,
                    "c_prepayment_type" => $request->c_prepayment_type,
                    "c_area" => $request->c_area,
                    "c_images" => $result,
                    "c_is_purtable" => $request->c_is_purtable == 'true' || $request->c_is_purtable == 1 ? 1 : 0
                ]
            );

            if ($request->c_is_purtable == 'true' || $request->c_is_purtable == 1){
                $count = (int)$request->part_count;
                DB::table('curt_part')->where('cp_court_id', $court->c_id)->delete();
                for ($i = 1; $i<=$count; $i++){
                    DB::table('curt_part')->insert(['cp_court_id' => $court->c_id]);
                }
            }

            $list = array();
            foreach ($request->infrastructury as $value) {
                array_push($list, $value['inf_id']);
            }

            $court->infrastructures()->sync($list);

            $list = array();
            foreach ($request->c_sport_type as $value) {
                array_push($list, $value['st_id']);
            }

            $court->sporttypes()->sync($list);

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
        Courts::where('c_id', $request->c_id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Успешно сохранено!',
        ]);
    }
}
