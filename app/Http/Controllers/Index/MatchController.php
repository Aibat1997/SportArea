<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SportTypes;

class MatchController extends Controller
{
    public function step1()
    {
        $types = SportTypes::orderBy('st_sort_num')->get();
        return view('index.match-step-1', compact('types'));
    }

    public function step2(SportTypes $type)
    {
        $complexes = $type->complexes;
        return view('index.match-step-2', compact('complexes'));
    }
}
