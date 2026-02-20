<?php

namespace App\Http\Controllers\Backend\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function all(){
        $divisions = Division::all();
        return view('backend.pages.division.all', compact('divisions'));
    }

    public function add(){
        return view('backend.pages.division.add');
    }

    public function edit($id){
        $division = Division::findOrFail($id);
        return response()->json($division);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_bn' => 'nullable|string|max:255',
        ]);

        $division = Division::findOrFail($id);
        $division->update([
            'name' => $request->name,
            'name_bn' => $request->name_bn,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Division updated successfully!'
        ]);
    }
}
