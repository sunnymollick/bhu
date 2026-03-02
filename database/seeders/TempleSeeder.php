<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Temple;
use App\Models\TempleActivities;
use App\Models\Activity;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;

class TempleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some IDs for relations
        $dhakaDivision = Division::where('name', 'Dhaka')->first();
        $chittagongDivision = Division::where('name', 'Chattogram')->first();
        $rajshahiDivision = Division::where('name', 'Rajshahi')->first();

        $dhakaDistrict = District::where('name', 'Dhaka')->first();
        $gazipurDistrict = District::where('name', 'Gazipur')->first();
        $chittagongDistrict = District::where('name', 'Chattogram')->first();
        $coxsbazarDistrict = District::where('name', "Cox's Bazar")->first();

        // Get activities
        $durgaPuja = Activity::where('title', 'Durga Puja')->first();
        $kaliPuja = Activity::where('title', 'Shyama Puja')->first();
        $saraswatiPuja = Activity::where('title', 'Saraswati Puja')->first();
        $wedding = Activity::where('title', 'Vivah')->first();
        $upanayan = Activity::where('title', 'Upanayan Ceremony')->first();
        $annaprashan = Activity::where('title', 'Annaprashan')->first();
        $namakaran = Activity::where('title', 'Namakaran')->first();
        $geetaClass = Activity::where('title', 'Geeta Class')->first();
        $yogaClass = Activity::where('title', 'Yoga and Meditation Classes')->first();
        $musicClass = Activity::where('title', 'Music')->first();

        $temples = [
            [
                'name' => 'Dhakeshwari National Temple',
                'name_bn' => 'ঢাকেশ্বরী জাতীয় মন্দির',
                'address' => 'Dhakeshwari Road, Dhaka 1100',
                'latitude' => '23.7286',
                'longitude' => '90.3880',
                'division_id' => $dhakaDivision?->id,
                'district_id' => $dhakaDistrict?->id,
                'contact_name' => 'Pandit Shuddhananda Mahathero',
                'contact_no' => '01711-123456',
                'designation' => 'Head Priest',
                'service_time' => 'Daily: 6:00 AM - 9:00 PM',
                'village' => 'Lalbagh',
                'post_office' => 'Dhakeshwari',
                'zipcode' => '1100',
                'residential_facility' => true,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'Dhakeshwari Temple is the National Temple of Bangladesh. It is located in the heart of Old Dhaka.',
                'activities' => [$durgaPuja, $kaliPuja, $saraswatiPuja, $wedding, $geetaClass, $yogaClass, $musicClass],
            ],
            [
                'name' => 'Ramna Kali Mandir',
                'name_bn' => 'রমনা কালী মন্দির',
                'address' => 'Ramna, Dhaka 1000',
                'latitude' => '23.7365',
                'longitude' => '90.3958',
                'division_id' => $dhakaDivision?->id,
                'district_id' => $dhakaDistrict?->id,
                'contact_name' => 'Swami Ramakrishna',
                'contact_no' => '01712-234567',
                'designation' => 'Temple Secretary',
                'service_time' => 'Daily: 5:00 AM - 8:00 PM',
                'village' => 'Ramna',
                'post_office' => 'Ramna',
                'zipcode' => '1000',
                'residential_facility' => false,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'Historic temple located in the Ramna area of Dhaka.',
                'activities' => [$kaliPuja, $durgaPuja, $yogaClass],
            ],
            [
                'name' => 'Kalibari Temple Gazipur',
                'name_bn' => 'কালীবাড়ি মন্দির গাজীপুর',
                'address' => 'Gazipur City, Gazipur',
                'latitude' => '23.9999',
                'longitude' => '90.4200',
                'division_id' => $dhakaDivision?->id,
                'district_id' => $gazipurDistrict?->id,
                'contact_name' => 'Pandit Gopal Krishna',
                'contact_no' => '01713-345678',
                'designation' => 'Chief Priest',
                'service_time' => 'Daily: 6:00 AM - 9:00 PM',
                'village' => 'Gazipur City',
                'post_office' => 'Gazipur Sadar',
                'zipcode' => '1700',
                'residential_facility' => true,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'Beautiful Kali temple in Gazipur with residential facilities.',
                'activities' => [$kaliPuja, $durgaPuja, $wedding, $upanayan, $annaprashan, $geetaClass],
            ],
            [
                'name' => 'Sri Sri Lakshmi Narayan Temple',
                'name_bn' => 'শ্রী শ্রী লক্ষ্মী নারায়ণ মন্দির',
                'address' => 'Lakshmibazar, Dhaka 1100',
                'latitude' => '23.7104',
                'longitude' => '90.4074',
                'division_id' => $dhakaDivision?->id,
                'district_id' => $dhakaDistrict?->id,
                'contact_name' => 'Pandit Vishwanath Sharma',
                'contact_no' => '01714-456789',
                'designation' => 'Temple Manager',
                'service_time' => 'Daily: 5:30 AM - 8:30 PM',
                'village' => 'Lakshmibazar',
                'post_office' => 'Lakshmibazar',
                'zipcode' => '1100',
                'residential_facility' => false,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'Temple dedicated to Lord Vishnu and Goddess Lakshmi.',
                'activities' => [$durgaPuja, $saraswatiPuja, $namakaran, $annaprashan, $musicClass],
            ],
        ];

        foreach ($temples as $templeData) {
            $activities = $templeData['activities'];
            unset($templeData['activities']);

            $temple = Temple::create($templeData);

            // Add activities
            foreach ($activities as $activity) {
                if ($activity) {
                    TempleActivities::create([
                        'temple_id' => $temple->id,
                        'activity_id' => $activity->id,
                        'status' => true,
                    ]);
                }
            }
        }
    }
}
