<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'primary_email'   => 'info@bengalihinduunity.com',
                'secondary_email' => 'support@bengalihinduunity.com',
                'primary_phone'   => '+1 123 456 7890',
                'secondary_phone' => '+1 987 654 3210',
                'address'         => '14/A, Poor Street City Tower, New York USA',
                'facebook_url'    => '#',
                'linkedin_url'    => '#',
                'x_url'           => '#',
                'youtube_url'     => '#',
                'map_embed'       => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.8223207034!2d90.25487647968428!3d23.78106706485271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1674745745678!5m2!1sen!2sbd',
            ]
        );
    }
}
