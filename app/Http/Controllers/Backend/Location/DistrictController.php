<?php

namespace App\Http\Controllers\Backend\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\District;
use App\Models\Division;

class DistrictController extends Controller
{
    public function all(){
        $districts = DB::table('districts')
                    ->leftJoin('divisions', 'districts.division_id', 'divisions.id')
                    ->select('divisions.name as division', 'districts.id', 'districts.name', 'districts.division_id', 'districts.name_bn')
                    ->get();
        $divisions = Division::all();
        return view('backend.pages.district.all', compact('districts', 'divisions'));
    }

    public function getDistricts($division_id){
        $districts = District::where('division_id', $division_id)->get();
        return response()->json($districts);
    }

    public function edit($id){
        $district = District::findOrFail($id);
        return response()->json($district);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_bn' => 'nullable|string|max:255',
            'division_id' => 'required|exists:divisions,id',
        ]);

        $district = District::findOrFail($id);
        $district->update([
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'division_id' => $request->division_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'District updated successfully!'
        ]);
    }
}
