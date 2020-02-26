<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\FavoriteField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteFieldController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->isFavorite($request->complex)) {
            $user->favorites()->detach($request->complex);
            return ['status' => false, 'id' => $request->complex];
        } else {
            $user->favorites()->attach($request->complex);
            return ['status' => true, 'id' => $request->complex];
        }
    }
}
