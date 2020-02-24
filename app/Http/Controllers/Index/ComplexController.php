<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use App\Models\ComplexDiscount;
use App\Models\Courts;
use App\Models\SportComplex;
use App\Models\SportTypes;
use Exception;
use Illuminate\Database\Eloquent\Builder;
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
        $complexes = $sporttype->complexes();

        if ($request->by_price != null) {
            if ($request->by_price == 1) {
                $courts = Courts::select(\DB::raw("MIN(c_cost) AS min_price"), 'c_complex_id')->orderBy('min_price', 'asc')->groupBy('c_complex_id')->get();
            } else {
                $courts = Courts::select(\DB::raw("MAX(c_cost) AS max_price"), 'c_complex_id')->orderBy('max_price', 'desc')->groupBy('c_complex_id')->get();
            }
            $complexes_id = array();
            foreach ($courts as $key => $court) {
                array_push($complexes_id, $court->c_complex_id);
            }

            $ids_ordered = implode(',', $complexes_id);
            $complexes->whereIn('sc_id', $complexes_id)->orderByRaw("FIELD(sc_id, $ids_ordered)");
        }
        if ($request->city != null) {
            $complexes->where('sc_city_id', $request->city);
        }
        if ($request->is_open != null) {
            $complexes->where('c_open_field', $request->is_open);
        }
        if ($request->coverage != null) {
            $complexes->whereHas('courts', function (Builder $query) use ($request) {
                $query->where('c_coverage_id', $request->coverage);
            });
        }
        if ($request->cost_from != null) {
            $complexes->whereHas('courts', function (Builder $query) use ($request) {
                $query->where('c_cost', '>=', $request->cost_from);
            });
        }
        if ($request->cost_to != null) {
            $complexes->whereHas('courts', function (Builder $query) use ($request) {
                $query->where('c_cost', '<=', $request->cost_to);
            });
        }
        if ($request->has('infrastructure')) {
            $complexes->whereHas('courts', function (Builder $query) use ($request) {
                $query->whereHas('infrastructures', function (Builder $query) use ($request) {
                    $query->whereIn('inf_id', $request->infrastructure);
                });
            });
        }

        $complexes = $complexes->get();

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

    public function showCourts(SportComplex $complex)
    {
        $courts = $complex->courts;
        return view('index.court', compact('complex', 'courts'));
    }
}
