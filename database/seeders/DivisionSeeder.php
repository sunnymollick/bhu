<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [
            ['name' => 'Dhaka', 'name_bn' => 'ঢাকা'],
            ['name' => 'Chattogram', 'name_bn' => 'চট্টগ্রাম'],
            ['name' => 'Khulna', 'name_bn' => 'খুলনা'],
            ['name' => 'Mymensingh', 'name_bn' => 'ময়মনসিংহ'],
            ['name' => 'Rajshahi', 'name_bn' => 'রাজশাহী'],
            ['name' => 'Rangpur', 'name_bn' => 'রংপুর'],
            ['name' => 'Barisal', 'name_bn' => 'বরিশাল'],
            ['name' => 'Sylhet', 'name_bn' => 'সিলেট'],
        ];

        foreach ($divisions as $division) {
            Division::create($division);
        }
    }
}
