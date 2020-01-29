<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeCoverage;
use Illuminate\Http\Request;

class TypeCoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coverages = TypeCoverage::orderBy('tc_sort_num', 'asc')->get();
        return view('admin.coverages', compact('coverages'));
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
        $result = TypeCoverage::create([
            'tc_name' => $request->tc_name,
            'tc_sort_num' => $request->tc_sort_num
        ]);

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeCoverage  $coverage
     * @return \Illuminate\Http\Response
     */
    public function show(TypeCoverage $coverage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeCoverage  $coverage
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeCoverage $coverage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeCoverage  $coverage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeCoverage $coverage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeCoverage  $coverage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeCoverage $coverage)
    {
        $coverage->delete();
    }
}
