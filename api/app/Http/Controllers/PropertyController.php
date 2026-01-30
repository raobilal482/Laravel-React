<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
     {
        return response()->json([
            'properties' => Property::all()
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $property = Property::create($request->all());
        return response()->json([
            'property' => $property
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $property = Property::find($id);
        return response()->json([
            'property' => $property
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $property = Property::find($id);

        $property->update($request->all());
        return response()->json([
            'property' => $property,
            'message' => 'Property Updated Successfully'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::find($id);
        $property->delete();
        return response()->json([
            'message' => 'Property Deleted Successfully'
        ],200);
    }
}
