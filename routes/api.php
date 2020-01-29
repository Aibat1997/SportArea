<?php

// use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')->group(function() {
    Route::get('helpers', 'HelperController@city');
    Route::post('add-complex', 'ComplexController@store');
});

