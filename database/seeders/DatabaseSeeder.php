<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            RoleSeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            UpazilaSeeder::class,
            UserSeeder::class,
            ActivityCategorySeeder::class,
            ActivitySeeder::class,
            BusinessCategorySeeder::class,
            BusinessSeeder::class,
            JobCategorySeeder::class,
            JobIndustrySeeder::class,
            TempleSeeder::class,
            HomeBannerSeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
