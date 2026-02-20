<?php

namespace App\Imports;

use App\Models\Temple;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TemplesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        // dd($row);
        // // Clean and trim column names (your Excel columns have spaces)
        // $divisionName = trim($row['division']);
        // $districtName = trim($row['district']);
        // $upazilaName = trim($row['upazila']);
        // $templeName = trim($row['temple name']);
        // $village = trim($row['village']);

        // // Find or create Division
        // $division = Division::firstOrCreate(['name' => $divisionName]);
        // // Find or create District
        // $district = District::firstOrCreate([
        //     'name' => $districtName,
        //     'division_id' => $division->id
        // ]);
        // // Find or create Upazila
        // $upazila = Upazila::firstOrCreate([
        //     'name' => $upazilaName,
        //     'district_id' => $district->id
        // ]);
        // return new Temple([
        //     'name'        => $templeName,
        //     'village'     => $village,
        //     'division_id' => $division->id,
        //     'district_id' => $district->id,
        //     'upazila_id'  => $upazila->id,
        // ]);

        // Clean up all keys and values
        $row = array_combine(
            array_map('trim', array_keys($row)),
            array_map('trim', array_values($row))
        );

        // Find Division
        $division = \App\Models\Division::where('name', $row['division'])->first();
        if (!$division) {
            // Optionally log or skip this row
            \Log::warning('Division not found: '.$row['division']);
            return null;
        }

        // Find District
        $district = \App\Models\District::where('name', $row['district'])
            ->where('division_id', $division->id)
            ->first();
        if (!$district) {
            \Log::warning('District not found: '.$row['district'].' in division '.$row['division']);
            return null;
        }

        // Find Upazila (note: in your Excel, the header is 'upazila ' with a space)
        $upazilaKey = 'upazila';
        foreach ($row as $key => $value) {
            if (strtolower(trim($key)) === 'upazila') {
                $upazilaKey = $key;
                break;
            }
        }

        $upazila = \App\Models\Upazila::where('name', $row[$upazilaKey])
            ->where('district_id', $district->id)
            ->first();
        if (!$upazila) {
            \Log::warning('Upazila not found: '.$row[$upazilaKey].' in district '.$row['district']);
            return null;
        }

        // Insert Temple
        $temple = new \App\Models\Temple();
        $temple->name = $row['temple_name'];
        $temple->village = $row['village'];
        $temple->division_id = $division->id;
        $temple->district_id = $district->id;
        $temple->upazila_id = $upazila->id;
        $temple->save();

        return null;
    }
}
