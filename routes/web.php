<?php

Route::middleware(['web'])->namespace('Admin')->prefix('admin')->group(function() {
    Route::resource('users', 'UsersController');
    Route::resource('role', 'RoleController');
    Route::resource('news', 'NewsController');
    Route::resource('sporttype', 'SportTypesController');
    Route::resource('city', 'CityController');
    Route::resource('infrastructures', 'InfrastructureController');
    Route::resource('coverages', 'TypeCoverageController');
    Route::get('/', function () {
        return view('admin.index');
    });
});

Route::middleware(['web'])->group(function() {
    Route::get('media/{file_name}', 'MediaController@getImage')->where('file_name', '.*');
    Route::get('media_avatar/{file_name}', 'MediaController@getAvatar')->where('file_name', '.*');
    Route::get('media_doc/{file_name}', 'MediaController@getFile')->where('file_name', '.*');
    Route::get('media_content/{file_name}', 'MediaController@getContentImage')->where('file_name', '.*');
    Route::post('content_image', 'MediaController@storeContentImage');
    Route::get('city/{locale}', 'LocalizationCityController@index');
});

Route::middleware(['web'])->namespace('Index')->group(function() {
    Route::get('/', 'IndexController@index');
    Route::get('news', 'NewsController@index');
    Route::get('news/{news}', 'NewsController@showById');
    Route::get('sport-type/{sporttype}', 'CourtController@showById');
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('login', 'AuthController@loginPage')->name('login');

    Route::get('inventory', 'InventoryController@all');

    Route::middleware(['auth'])->group(function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('profile', 'AuthController@profile');
        Route::get('add-complex', 'ComplexController@create');
        Route::post('store-complex', 'ComplexController@store');
    });
});