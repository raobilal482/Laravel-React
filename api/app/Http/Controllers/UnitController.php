<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        return response()->json([
            'units' => Unit::all(),
            'status' => true
        ],200);
    }

    public function store(Request $request){

        $unit = Unit::create([
            'name' => $request->name,
            'type' => $request->type,
            'created_by' => 1
        ]);
        return response()->json([
            'unit' => $unit,
            'message' => 'Unit Created Successfully',
            'status' => true
        ],200);
    }

    public function show($id){
        return response()->json([
            'unit' => Unit::find($id)
        ],200);
    }


    public function update(Request $request,Unit $unit){

       $unitData =  $unit->update([
            'name' => $request->name,
            'type' => $request->type
        ]);
        return response()->json([
            'unit' => $unitData,
            'message' => 'Unit Updated'
        ],200);
    }

    public function destroy($id){

        $unit = Unit::find($id)->delete();
        return response()->json([
            'unit' => $unit,
            'message' => 'Deleted',
            'status' => true
        ],200);
    }


}
