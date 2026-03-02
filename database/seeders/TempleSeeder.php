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
            [
                'name' => 'Chittagong Kali Temple',
                'name_bn' => 'চট্টগ্রাম কালী মন্দির',
                'address' => 'Dewanhat, Chittagong',
                'latitude' => '22.3569',
                'longitude' => '91.7832',
                'division_id' => $chittagongDivision?->id,
                'district_id' => $chittagongDistrict?->id,
                'contact_name' => 'Pandit Shyam Sundar Das',
                'contact_no' => '01715-567890',
                'designation' => 'Head Priest',
                'service_time' => 'Daily: 6:00 AM - 9:00 PM',
                'village' => 'Dewanhat',
                'post_office' => 'Dewanhat',
                'zipcode' => '4100',
                'residential_facility' => true,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'Ancient Kali temple in Chittagong city.',
                'activities' => [$kaliPuja, $durgaPuja, $saraswatiPuja, $wedding, $geetaClass, $yogaClass],
            ],
            [
                'name' => 'Chandranath Temple',
                'name_bn' => 'চন্দ্রনাথ মন্দির',
                'address' => 'Sitakunda, Chittagong',
                'latitude' => '22.6266',
                'longitude' => '91.6598',
                'division_id' => $chittagongDivision?->id,
                'district_id' => $chittagongDistrict?->id,
                'contact_name' => 'Swami Chandranath',
                'contact_no' => '01716-678901',
                'designation' => 'Temple Priest',
                'service_time' => 'Daily: 5:00 AM - 7:00 PM',
                'village' => 'Sitakunda',
                'post_office' => 'Sitakunda',
                'zipcode' => '4310',
                'residential_facility' => false,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'Temple on a hilltop, famous for its scenic location.',
                'activities' => [$durgaPuja, $yogaClass],
            ],
            [
                'name' => 'Shiva Temple Gazipur',
                'name_bn' => 'শিব মন্দির গাজীপুর',
                'address' => 'Kaliakair, Gazipur',
                'latitude' => '24.0833',
                'longitude' => '90.2167',
                'division_id' => $dhakaDivision?->id,
                'district_id' => $gazipurDistrict?->id,
                'contact_name' => 'Pandit Mahadev Sharma',
                'contact_no' => '01717-789012',
                'designation' => 'Chief Priest',
                'service_time' => 'Daily: 5:30 AM - 8:30 PM',
                'village' => 'Kaliakair',
                'post_office' => 'Kaliakair',
                'zipcode' => '1750',
                'residential_facility' => true,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'Temple dedicated to Lord Shiva with modern facilities.',
                'activities' => [$durgaPuja, $saraswatiPuja, $wedding, $upanayan, $annaprashan, $namakaran, $geetaClass, $yogaClass, $musicClass],
            ],
            [
                'name' => 'Durga Mandir Mirpur',
                'name_bn' => 'দুর্গা মন্দির মিরপুর',
                'address' => 'Mirpur-10, Dhaka',
                'latitude' => '23.8068',
                'longitude' => '90.3687',
                'division_id' => $dhakaDivision?->id,
                'district_id' => $dhakaDistrict?->id,
                'contact_name' => 'Pandit Durga Prasad',
                'contact_no' => '01718-890123',
                'designation' => 'Temple Secretary',
                'service_time' => 'Daily: 6:00 AM - 8:00 PM',
                'village' => 'Mirpur',
                'post_office' => 'Mirpur-10',
                'zipcode' => '1216',
                'residential_facility' => false,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'Community temple serving Mirpur area.',
                'activities' => [$durgaPuja, $kaliPuja, $saraswatiPuja, $musicClass],
            ],
            [
                'name' => 'Ram Mandir Uttara',
                'name_bn' => 'রাম মন্দির উত্তরা',
                'address' => 'Sector 7, Uttara, Dhaka',
                'latitude' => '23.8759',
                'longitude' => '90.3795',
                'division_id' => $dhakaDivision?->id,
                'district_id' => $dhakaDistrict?->id,
                'contact_name' => 'Pandit Ram Gopal',
                'contact_no' => '01719-901234',
                'designation' => 'Head Priest',
                'service_time' => 'Daily: 5:00 AM - 9:00 PM',
                'village' => 'Uttara',
                'post_office' => 'Uttara',
                'zipcode' => '1230',
                'residential_facility' => false,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'Modern temple in Uttara residential area.',
                'activities' => [$durgaPuja, $wedding, $geetaClass, $yogaClass],
            ],
            [
                'name' => 'Saraswati Mandir Dhanmondi',
                'name_bn' => 'সরস্বতী মন্দির ধানমন্ডি',
                'address' => 'Road 27, Dhanmondi, Dhaka',
                'latitude' => '23.7461',
                'longitude' => '90.3742',
                'division_id' => $dhakaDivision?->id,
                'district_id' => $dhakaDistrict?->id,
                'contact_name' => 'Pandit Saraswati Prasad',
                'contact_no' => '01710-012345',
                'designation' => 'Temple Manager',
                'service_time' => 'Daily: 6:00 AM - 8:00 PM',
                'village' => 'Dhanmondi',
                'post_office' => 'Dhanmondi',
                'zipcode' => '1209',
                'residential_facility' => false,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'Temple dedicated to Goddess Saraswati, popular among students.',
                'activities' => [$saraswatiPuja, $geetaClass, $musicClass],
            ],
            [
                'name' => 'Hanuman Temple Gazipur',
                'name_bn' => 'হনুমান মন্দির গাজীপুর',
                'address' => 'Tongi, Gazipur',
                'latitude' => '23.8931',
                'longitude' => '90.4077',
                'division_id' => $dhakaDivision?->id,
                'district_id' => $gazipurDistrict?->id,
                'contact_name' => 'Pandit Hanuman Das',
                'contact_no' => '01721-123456',
                'designation' => 'Chief Priest',
                'service_time' => 'Daily: 5:30 AM - 9:00 PM',
                'village' => 'Tongi',
                'post_office' => 'Tongi',
                'zipcode' => '1711',
                'residential_facility' => true,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'Temple with residential facilities and educational programs.',
                'activities' => [$durgaPuja, $upanayan, $namakaran, $geetaClass, $yogaClass, $musicClass],
            ],
            [
                'name' => 'ISKCON Dhaka',
                'name_bn' => 'ইসকন ঢাকা',
                'address' => 'Swamibagh, Dhaka 1100',
                'latitude' => '23.7250',
                'longitude' => '90.3954',
                'division_id' => $dhakaDivision?->id,
                'district_id' => $dhakaDistrict?->id,
                'contact_name' => 'Swami Prabhupada Das',
                'contact_no' => '01722-234567',
                'designation' => 'Temple President',
                'service_time' => 'Daily: 4:30 AM - 9:00 PM',
                'village' => 'Swamibagh',
                'post_office' => 'Swamibagh',
                'zipcode' => '1100',
                'residential_facility' => true,
                'status' => true,
                'approval_status' => 'approved',
                'approved_by' => 1,
                'approved_at' => now(),
                'created_by' => 1,
                'description' => 'International Society for Krishna Consciousness temple with full facilities.',
                'activities' => [$durgaPuja, $saraswatiPuja, $wedding, $upanayan, $annaprashan, $namakaran, $geetaClass, $yogaClass, $musicClass],
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
