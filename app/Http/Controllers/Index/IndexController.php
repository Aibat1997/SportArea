<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\SportTypes;
use App\Models\City;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $city_id = City::where('city_name', 'like', '%Алма%')->first()->city_id;
        
        if(!$request->session()->has('city')){
            session()->put('city', $city_id);
        }

        $news = News::orderBy('created_at')->get();
        $types = SportTypes::orderBy('st_sort_num')->get();
        return view('index.index', compact('news', 'types'));
    }
}
