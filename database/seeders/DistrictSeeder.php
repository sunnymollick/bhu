<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Division names and their districts
        $divisionsWithDistricts = [
            'Dhaka' => [
                'Dhaka', 'Faridpur', 'Gazipur', 'Gopalganj', 'Kishoreganj',
                'Madaripur', 'Manikganj', 'Munshiganj', 'Narayanganj', 'Narshingdi',
                'Rajbari', 'Shariatpur', 'Tangail',
            ],
            'Chattogram' => [
                'Bandarban', 'Brahmanbaria', 'Chandpur', 'Chattogram', 'Cumilla',
                'Cox\'s Bazar', 'Feni', 'Khagrachari', 'Lakshmipur', 'Noakhali', 'Rangamati',
            ],
            'Rajshahi' => [
                'Bogura', 'Chapai Nawabganj', 'Joypurhat', 'Naogaon', 'Natore',
                'Pabna', 'Rajshahi', 'Sirajganj',
            ],
            'Khulna' => [
                'Bagerhat', 'Chuadanga', 'Jashore', 'Jhenaidah', 'Khulna',
                'Kushtia', 'Magura', 'Meherpur', 'Narail', 'Satkhira',
            ],
            'Barisal' => [
                'Barguna', 'Barisal', 'Bhola', 'Jhalokati', 'Patuakhali', 'Pirojpur',
            ],
            'Sylhet' => [
                'Habiganj', 'Moulvibazar', 'Sunamganj', 'Sylhet',
            ],
            'Rangpur' => [
                'Dinajpur', 'Gaibandha', 'Kurigram', 'Lalmonirhat', 'Nilphamari',
                'Panchagarh', 'Rangpur', 'Thakurgaon',
            ],
            'Mymensingh' => [
                'Jamalpur', 'Mymensingh', 'Netrokona', 'Sherpur',
            ],
        ];

        foreach ($divisionsWithDistricts as $divisionName => $districts) {
            // Get division_id from database
            $division = DB::table('divisions')->where('name', $divisionName)->first();

            if ($division) {
                foreach ($districts as $districtName) {
                    DB::table('districts')->insert([
                        'name' => $districtName,
                        'division_id' => $division->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
