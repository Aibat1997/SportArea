<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courts;
use App\Models\SportTypes;
use App\Models\SportComplex;

class CourtController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
    }
}
