<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BusinessCategory;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Manufacturing and Production', 'name_bn' => 'উৎপাদন ও প্রস্তুতি', 'category_type' => 'business'],
            ['name' => 'Construction and Real Estate', 'name_bn' => 'নির্মাণ ও রিয়েল এস্টেট', 'category_type' => 'business'],
            ['name' => 'Retail and Wholesale', 'name_bn' => 'খুচরা ও পাইকারি', 'category_type' => 'business'],
            ['name' => 'Transportation and Logistics', 'name_bn' => 'পরিবহন ও লজিস্টিকস', 'category_type' => 'business'],
            ['name' => 'Hospitality and Food Services', 'name_bn' => 'হাসপাতালিটি ও খাদ্য সেবা', 'category_type' => 'business'],
            ['name' => 'Healthcare and Social Services', 'name_bn' => 'স্বাস্থ্যসেবা ও সামাজিক সেবা', 'category_type' => 'business'],
            ['name' => 'Professional and Technical Services', 'name_bn' => 'পেশাদার ও প্রযুক্তিগত সেবা', 'category_type' => 'business'],
            ['name' => 'Agriculture and Natural Resources', 'name_bn' => 'কৃষি ও প্রাকৃতিক সম্পদ', 'category_type' => 'business'],
            ['name' => 'Energy and Utilities', 'name_bn' => 'শক্তি ও ইউটিলিটি', 'category_type' => 'business'],
            ['name' => 'Education and Training', 'name_bn' => 'শিক্ষা ও প্রশিক্ষণ', 'category_type' => 'business'],
            ['name' => 'Arts, Entertainment, and Media', 'name_bn' => 'শিল্প, বিনোদন, এবং মিডিয়া', 'category_type' => 'business'],
            // Religious categories
            ['name' => 'Temples & Worship Centers', 'name_bn' => 'মন্দির ও উপাসনা কেন্দ্র', 'category_type' => 'religious'],
            ['name' => 'Religious Education & Training Centers', 'name_bn' => 'ধর্মীয় শিক্ষা ও প্রশিক্ষণ কেন্দ্র', 'category_type' => 'religious'],
            ['name' => 'Cultural & Spiritual Organizations', 'name_bn' => 'সাংস্কৃতিক ও আধ্যাত্মিক সংস্থা', 'category_type' => 'religious'],
            ['name' => 'Charity & Seva Organizations', 'name_bn' => 'দাতব্য ও সেবা সংস্থা', 'category_type' => 'religious'],
            ['name' => 'Religious Event & Pilgrimage Management', 'name_bn' => 'ধর্মীয় অনুষ্ঠান ও তীর্থযাত্রা ব্যবস্থাপনা', 'category_type' => 'religious'],
            ['name' => 'Hindu Community & Social Organizations', 'name_bn' => 'হিন্দু সম্প্রদায় ও সামাজিক সংস্থা', 'category_type' => 'religious'],
            ['name' => 'Youth & Volunteer Organizations', 'name_bn' => 'যুব ও স্বেচ্ছাসেবক সংস্থা', 'category_type' => 'religious'],
        ];

        foreach ($categories as $category) {
            BusinessCategory::create($category);
        }
    }
}
