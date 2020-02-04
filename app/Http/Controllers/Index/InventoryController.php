<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            "inv_name" => "required",
            "inv_cost" => "required"
        ]);

        try {
            Inventory::create([
            'inv_complex_id' => Auth::user()->complex()->first()->sc_id,
            'inv_name' => $request->inv_name,
            'inv_cost' => $request->inv_cost
            ]);

            return response()->json([
            'status' => true,
            'message' => 'Успешно сохранено!'
            ]);
        } catch (Exception $e) {
            report($e);
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $inventory = Inventory::updateOrCreate(
                ['inv_id' => $request->inv_id],
                [
                    'inv_name' => $request->inv_name,
                    'inv_cost' => $request->inv_cost,
                    'inv_is_active' => $request->inv_is_active == false || $request->inv_is_active == '0' ? 0 : 1,
                ]);

        return response()->json(['status' => true, 'content' => $inventory]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
