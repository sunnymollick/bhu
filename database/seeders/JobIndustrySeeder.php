<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobIndustry;

class JobIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            'Agro based Industry',
            'Archi./Engg./Construction',
            'Automobile/Industrial Machine',
            'Bank/Non-Bank Fin. Institution',
            'Education',
            'Electronics/Consumer Durables',
            'Energy/Power/Fuel',
            'Garments/Textile',
            'Govt./Semi-Govt./Autonomous',
            'Pharmaceuticals',
            'Hospital/ Diagnostic Center',
            'Airline/ Travel/ Tourism',
            'Manufacturing (Light Industry)',
            'Manufacturing (Heavy Industry)',
            'Hotel/Restaurant',
            'Information Technology (IT)',
            'Logistics/ Transportation',
            'Entertainment/ Recreation',
            'Media / Advertising/ Event Mgt.',
            'NGO/Development',
            'Real Estate/Development',
            'Wholesale/ Retail/ Export-Import',
            'Telecommunication',
            'Food & Beverage Industry',
            'Security Service',
            'Fire, Safety & Protection',
            'E-Commerce/ F-Commerce',
            'Others',
        ];

        foreach ($industries as $name) {
            JobIndustry::firstOrCreate(['name' => $name]);
        }
    }
}
