<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
     {
        return response()->json([
            'Types' => Type::all()
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = Type::create($request->all());
        return response()->json([
            'type' => $type,
            'message' => 'Type Created Successfully'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $type = Type::find($id);
        return response()->json([
            'type' => $type,

        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = Type::find($id);

        $type->update($request->all());
        return response()->json([
            'type' => $type,
            'message' => 'Type Updated Successfully'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::find($id);
        $type->delete();
        return response()->json([
            'message' => 'Type Deleted Successfully'
        ],200);
    }
}
