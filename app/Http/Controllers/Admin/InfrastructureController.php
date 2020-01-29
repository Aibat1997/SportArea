<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infrastructure;
use Illuminate\Http\Request;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infrastructures = Infrastructure::orderBy('inf_sort_num', 'asc')->get();
        return view('admin.infrastructures', compact('infrastructures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = Infrastructure::create([
            'inf_name' => $request->inf_name,
            'inf_sort_num' => $request->inf_sort_num
        ]);

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function show(Infrastructure $infrastructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function edit(Infrastructure $infrastructure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infrastructure $infrastructure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infrastructure $infrastructure)
    {
        $infrastructure->delete();
    }
}
