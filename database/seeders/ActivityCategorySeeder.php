<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActivityCategory;

class ActivityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Daily Rituals', 'name_bn' => 'দৈনন্দিন পূজা'],
            ['name' => 'Festivals', 'name_bn' => 'উৎসব'],
            ['name' => 'Educational', 'name_bn' => 'শিক্ষামূলক'],
            ['name' => 'Community Service', 'name_bn' => 'সমাজসেবা'],
            ['name' => 'Special Ceremonies', 'name_bn' => 'বিশেষ অনুষ্ঠান'],
        ];

        foreach ($categories as $category) {
            ActivityCategory::create($category);
        }
    }
}
