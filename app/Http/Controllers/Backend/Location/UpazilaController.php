<?php

namespace App\Http\Controllers\Backend\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Upazila;
use App\Models\Division;
use App\Models\District;

class UpazilaController extends Controller
{
    public function all(){
        $upazilas = DB::table('upazilas')
                    ->leftJoin('districts', 'upazilas.district_id', 'districts.id')
                    ->leftJoin('divisions', 'upazilas.division_id', 'divisions.id')
                    ->select('upazilas.id', 'upazilas.name as upazila', 'divisions.name as division', 'districts.name as district', 'upazilas.division_id', 'upazilas.district_id', 'upazilas.name_bn')
                    ->get();
        $divisions = Division::all();
        return view('backend.pages.upazila.all', compact('upazilas', 'divisions'));
    }

    public function getUpazilas($district_id){
        $upazilas = Upazila::where('district_id', $district_id)->get();
        return response()->json($upazilas);
    }

    public function edit($id){
        $upazila = Upazila::findOrFail($id);
        return response()->json($upazila);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_bn' => 'nullable|string|max:255',
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
        ]);

        $upazila = Upazila::findOrFail($id);
        $upazila->update([
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Upazila updated successfully!'
        ]);
    }
}
