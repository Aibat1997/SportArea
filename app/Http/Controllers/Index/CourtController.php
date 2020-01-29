<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courts;
use App\Models\SportTypes;
use App\Models\SportComplex;

class CourtController extends Controller
{
    public function showById(Request $request, SportTypes $sporttype)
    {
        $complexes = $sporttype->complexes()->get();
        return view('index.sport-inside', compact('complexes'));
    }
}
