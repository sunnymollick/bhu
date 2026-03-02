<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class HomeBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'image_name' => 'h1.webp',
                'title' => 'BHU (Bengali Hindu Unity) fighting for our rights',
                'subtitle' => 'We are concerned Hindus working to unite 20 million fellow Hindus under a single organization to advocate for our rights.',
                'button_text_1' => 'Join Today',
                'button_link_1' => '/contact-us',
                'button_text_2' => 'View Services',
                'button_link_2' => '/services',
                'location' => 'home',
                'sort_order' => 1,
                'status' => true,
            ],
            [
                'image_name' => 'placeholder.jpg', // Will use placeholder
                'title' => 'Get united under one platform',
                'subtitle' => 'Connecting every voice of Hindu heritage—stronger together, smarter together.',
                'button_text_1' => 'Join Today',
                'button_link_1' => '/contact-us',
                'button_text_2' => 'View Services',
                'button_link_2' => '/services',
                'location' => 'home',
                'sort_order' => 2,
                'status' => true,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::updateOrCreate(
                [
                    'title' => $banner['title'],
                    'location' => $banner['location']
                ],
                $banner
            );
        }
    }
}
