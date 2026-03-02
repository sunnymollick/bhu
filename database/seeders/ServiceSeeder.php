<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Promote Business',
                'description' => 'Showcase and support Hindu-owned businesses. Grow your network, find trusted partners, and strengthen our community economy.',
                'icon' => 'fa-briefcase',
                'order' => 1,
                'status' => true,
            ],
            [
                'title' => 'Study Help',
                'description' => 'Get access to study materials, tutoring, and peer guidance so Hindu students can achieve their academic goals with confidence.',
                'icon' => 'fa-graduation-cap',
                'order' => 2,
                'status' => true,
            ],
            [
                'title' => 'Medical Help',
                'description' => 'Find reliable doctors, clinics, and medical support within the community. Together, we ensure better healthcare access for all.',
                'icon' => 'fa-medkit',
                'order' => 3,
                'status' => true,
            ],
            [
                'title' => 'Financial Stability',
                'description' => 'Connect with resources, advice, and support systems that help community members achieve financial security and independence.',
                'icon' => 'fa-dollar-sign',
                'order' => 4,
                'status' => true,
            ],
            [
                'title' => 'Residential Facility',
                'description' => 'Discover safe housing options and connect with trusted landlords or facilities that respect and protect our community.',
                'icon' => 'fa-home',
                'order' => 5,
                'status' => true,
            ],
            [
                'title' => 'Counseling',
                'description' => 'Receive guidance and emotional support in a safe space. Professional and community counseling is available for those in need.',
                'icon' => 'fa-comments',
                'order' => 6,
                'status' => true,
            ],
            [
                'title' => 'Job Finding',
                'description' => 'Explore job opportunities shared within the community. We help connect skilled individuals with employers who value their talents.',
                'icon' => 'fa-search',
                'order' => 7,
                'status' => true,
            ],
            [
                'title' => 'Career Advice',
                'description' => 'Get mentorship and professional guidance to choose the right career path and achieve long-term success.',
                'icon' => 'fa-chart-line',
                'order' => 8,
                'status' => true,
            ],
            [
                'title' => 'Event Booking',
                'description' => 'Search for venues to host cultural, social, and religious events. Easily book spaces that celebrate and respect our traditions.',
                'icon' => 'fa-calendar-alt',
                'order' => 9,
                'status' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                $service
            );
        }
    }
}
