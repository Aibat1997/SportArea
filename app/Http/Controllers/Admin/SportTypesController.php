<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SportTypes;
use Illuminate\Http\Request;
use App\Http\Helpers;


class SportTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sporttype = SportTypes::orderBy('created_at', 'desc')->get();
        return view('admin.sporttype.sporttype', compact('sporttype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sporttype.edit-sporttype');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'st_name' => 'required',
            'st_sort_num' => 'required',
            'st_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('st_img')) {
            $result = Helpers::storeImg('st_img', 'image', $request);
        }

        SportTypes::create([
            'st_name' => $request->st_name,
            'st_sort_num' => $request->st_sort_num,
            'st_img' => $result
        ]);

        return redirect('/admin/sporttype');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SportTypes  $sporttype
     * @return \Illuminate\Http\Response
     */
    public function show(SportTypes $sporttype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SportTypes  $sporttype
     * @return \Illuminate\Http\Response
     */
    public function edit(SportTypes $sporttype)
    {
        return view('admin.sporttype.edit-sporttype', compact('sporttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SportTypes  $sporttype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SportTypes $sporttype)
    {
        $request->validate([
            'st_name' => 'required',
            'st_sort_num' => 'required'
        ]);

        if ($request->hasFile('st_img')) {
            $result = Helpers::storeImg('st_img', 'image', $request);
        }else{
            $result = $sporttype->st_img;
        }

        $sporttype->update([
            'st_name' => $request->st_name,
            'st_sort_num' => $request->st_sort_num,
            'st_img' => $result
        ]);

        return redirect('/admin/sporttype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SportTypes  $sporttype
     * @return \Illuminate\Http\Response
     */
    public function destroy(SportTypes $sporttype)
    {
        $sporttype->delete();
    }
}
