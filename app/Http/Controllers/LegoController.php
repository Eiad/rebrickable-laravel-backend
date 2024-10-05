<?php

namespace App\Http\Controllers;

use App\Models\LegoPart;
use Illuminate\Http\Request;

class LegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LegoPart::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'set_id' => 'required|unique:lego_parts',
            'part_number' => 'required',
        ]);

        return LegoPart::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(LegoPart $legoPart)
    {
        return $legoPart;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LegoPart $legoPart)
    {
        $request->validate([
            'name' => 'required',
            'set_id' => 'required|unique:lego_parts,set_id,' . $legoPart->id,
            'part_number' => 'required',
        ]);

        $legoPart->update($request->all());
        return $legoPart;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LegoPart $legoPart)
    {
        $legoPart->delete();
        return response()->json(null, 204);
    }
}
