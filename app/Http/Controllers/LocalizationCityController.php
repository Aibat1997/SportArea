<?php

namespace App\Http\Controllers;

class LocalizationCityController extends Controller
{
    public function index($locale)
    {
        session()->put('city', $locale);
        return redirect()->back();
    }
}
