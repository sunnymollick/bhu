<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\ActivityCategory;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            // 🕉️ Daily & Regular
            [
                'category' => 'Daily Rituals',
                'title' => 'Morning Aarti',
                'title_bn' => 'প্রাতঃ আরতি'
            ],
            [
                'category' => 'Daily Rituals',
                'title' => 'Evening Aarti',
                'title_bn' => 'সান্ধ্য আরতি'
            ],
            [
                'category' => 'Daily Rituals',
                'title' => 'Abhishekam',
                'title_bn' => 'অভিষেক'
            ],
            [
                'category' => 'Daily Rituals',
                'title' => 'Archana',
                'title_bn' => 'অর্চনা'
            ],
            [
                'category' => 'Daily Rituals',
                'title' => 'Darshan', 
                'title_bn' => 'দর্শন'
            ],
            [
                'category' => 'Daily Rituals',
                'title' => 'Prasad Distribution', 
                'title_bn' => 'প্রসাদ বিতরণ'
            ],
            [
                'category' => 'Daily Rituals',
                'title' => 'Bhajan/Kirtan Sessions', 
                'title_bn' => 'ভজন/কীর্তন',
            ],
            [
                'category' => 'Daily Rituals',
                'title' => 'Chanting and Recitation', 
                'title_bn' => 'স্তোত্র পাঠ ও জপ',
            ],

            // 🌟 Festivals
            [
                'category' => 'Festivals',
                'title' => 'Diwali Celebration',
                'title_bn' => 'দীপাবলি উৎসব'
            ],
            [
                'category' => 'Festivals',
                'title' => 'Vishwakarma Puja',
                'title_bn' => 'বিশ্বকর্মা পূজা'
            ],
            [
                'category' => 'Festivals',
                'title' => 'Rath Yatra',
                'title_bn' => 'রথযাত্রা'
            ],
            [
                'category' => 'Festivals',
                'title' => 'Purnima/Amavasya Puja',
                'title_bn' => 'পূর্ণিমা ও অমাবস্যা পূজা'
            ],
            [
                'category' => 'Festivals',
                'title' => 'Ekadashi Fasting and Puja',
                'title_bn' => 'একাদশী উপবাস ও পূজা'
            ],
            [
                'category' => 'Festivals',
                'title' => 'Durga Puja',
                'title_bn' => 'দুর্গা পূজা'
            ],
            [
                'category' => 'Festivals',
                'title' => 'Shyama Puja',
                'title_bn' => 'শ্যামা পূজা'
            ],
            [
                'category' => 'Festivals',
                'title' => 'Saraswati Puja',
                'title_bn' => 'সরস্বতী পূজা'
            ],
            [
                'category' => 'Festivals',
                'title' => 'Janmashtami',
                'title_bn' => 'জন্মাষ্টমী'
            ],
            [
                'category' => 'Festivals',
                'title' => 'Shani Puja',
                'title_bn' => 'শনি পূজা'
            ],

            // 📖 Educational
            [
                'category' => 'Educational',
                'title' => 'Geeta Class',
                'title_bn' => 'গীতা পাঠ'
            ],
            [
                'category' => 'Educational',
                'title' => 'Bhagavatam Class',
                'title_bn' => 'ভাগবত পাঠ'
            ],
            [
                'category' => 'Educational',
                'title' => 'Bal Vikas (Children’s Class)',
                'title_bn' => 'বাল বিকাশ (ছোটদের ক্লাস)'
            ],
            [
                'category' => 'Educational',
                'title' => 'Sanskrit Class',
                'title_bn' => 'সংস্কৃত পাঠ'
            ],
            [
                'category' => 'Educational',
                'title' => 'Dance',
                'title_bn' => 'নৃত্য'
            ],
            [
                'category' => 'Educational',
                'title' => 'Music',
                'title_bn' => 'সংগীত'
            ],
            [
                'category' => 'Educational',
                'title' => 'Drama',
                'title_bn' => 'নাটক'
            ],
            [
                'category' => 'Educational',
                'title' => 'Satsangs',
                'title_bn' => 'সত্যসঙ্গ' 
            ],
            [
                'category' => 'Educational',
                'title' => 'Yoga and Meditation Classes',
                'title_bn' => 'যোগ ও ধ্যান ক্লাস'
            ],

            // ❤️ Community Service
            [
                'category' => 'Community Service',
                'title' => 'Annadanam',
                'title_bn' => 'অন্নদান'
            ],
            [
                'category' => 'Community Service',
                'title' => 'Health Camp',
                'title_bn' => 'স্বাস্থ্য শিবির'
            ],
            [
                'category' => 'Community Service',
                'title' => 'Charity Drives',
                'title_bn' => 'দান কার্যক্রম (জিনিসপত্র, রক্তদান, পোশাক ইত্যাদি)'
            ],
            [
                'category' => 'Community Service',
                'title' => 'Volunteer Opportunities',
                'title_bn' => 'স্বেচ্ছাসেবা (মন্দির পরিস্কার, রান্না, ইভেন্ট ম্যানেজমেন্ট)'
            ],

            // 🔥 Special Ceremonies
            [
                'category' => 'Special Ceremonies',
                'title' => 'Homa (Fire Ritual)',
                'title_bn' => 'হোম যজ্ঞ'
            ],
            [
                'category' => 'Special Ceremonies',
                'title' => 'Upanayan Ceremony',
                'title_bn' => 'উপনয়ন অনুষ্ঠান'
            ],
            [
                'category' => 'Special Ceremonies',
                'title' => 'Vivah',
                'title_bn' => 'বিবাহ'
            ],
            [
                'category' => 'Special Ceremonies',
                'title' => 'Namakaran',
                'title_bn' => 'নামকরণ'
            ],
            [
                'category' => 'Special Ceremonies',
                'title' => 'Annaprashan',
                'title_bn' => 'অন্নপ্রাশন'
            ]
        ];

        foreach ($activities as $data) {
            $category = ActivityCategory::where('name', $data['category'])->first();

            if ($category) {
                Activity::create([
                    'activity_category_id' => $category->id,
                    'title' => $data['title'],
                    'title_bn' => $data['title_bn']
                ]);
            }
        }
    }
}
