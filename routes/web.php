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
    //For Vue
    Route::get('/helpers', 'HelperController@informations');
    Route::get('/inventory', 'HelperController@inventory');
    Route::get('/courts', 'HelperController@courts');
});

Route::middleware(['web'])->namespace('Index')->group(function() {
    Route::get('/', 'IndexController@index');
    Route::get('news', 'NewsController@index');
    Route::get('news/{news}', 'NewsController@showById');
    Route::get('sport-type/{sporttype}', 'ComplexController@showById');
    Route::get('complex/{complex}/courts', 'ComplexController@showCourts');
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('login', 'AuthController@loginPage')->name('login');

    Route::middleware(['auth'])->group(function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('profile', 'AuthController@profile');
        Route::post('profile', 'AuthController@profileChange');
        Route::get('add-complex', 'ComplexController@create');
        Route::get('complex/{complex}/edit', 'ComplexController@edit');
        Route::post('store-complex', 'ComplexController@store');
        Route::post('store-inventory', 'InventoryController@store');
        Route::post('update-inventory', 'InventoryController@update');
        Route::post('store-court', 'CourtController@store');
        Route::put('update-court', 'CourtController@update');
        Route::post('delete-court', 'CourtController@delete');
        Route::get('complex/{complex}', 'ComplexController@infoById');
        Route::get('book-calendar', 'BookController@index');
        Route::get('add-book', 'BookController@create');
        Route::post('store-book', 'BookController@store');
        Route::post('complex/{complex}/discount', 'ComplexDiscountController@storeDiscount');
        Route::post('complex/discount/change', 'ComplexDiscountController@updateDiscount');
        Route::post('complex/{complex}/review', 'ReviewsController@store');
        Route::post('user-favorite', 'FavoriteFieldController@store');
        Route::get('match-1', 'MatchController@step1');
        Route::get('match-2/{type}', 'MatchController@step2');
    });
});
