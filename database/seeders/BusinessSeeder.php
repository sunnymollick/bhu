<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Business;
use App\Models\BusinessCategory;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $businesses = [
            // 1. Manufacturing and Production
            ['category' => 'Manufacturing and Production', 'title' => 'Manufacturers (e.g., machinery, electronics, textiles)'],
            ['category' => 'Manufacturing and Production', 'title' => 'Food and Beverage Production'],
            ['category' => 'Manufacturing and Production', 'title' => 'Chemical and Pharmaceutical Production'],
            ['category' => 'Manufacturing and Production', 'title' => 'Automotive Manufacturing'],
            ['category' => 'Manufacturing and Production', 'title' => 'Furniture and Wood Products'],
            ['category' => 'Manufacturing and Production', 'title' => 'Metal and Plastic Fabrication'],

            // 2. Construction and Real Estate
            ['category' => 'Construction and Real Estate', 'title' => 'General Contractors'],
            ['category' => 'Construction and Real Estate', 'title' => 'Specialty Contractors (e.g., plumbing, electrical, roofing)'],
            ['category' => 'Construction and Real Estate', 'title' => 'Property Development Companies'],
            ['category' => 'Construction and Real Estate', 'title' => 'Real Estate Agencies and Brokerages'],
            ['category' => 'Construction and Real Estate', 'title' => 'Property Management Firms'],
            ['category' => 'Construction and Real Estate', 'title' => 'Architecture and Design Services'],

            // 3. Retail and Wholesale
            ['category' => 'Retail and Wholesale', 'title' => 'Retail Shops (e.g., clothing, grocery, electronics)'],
            ['category' => 'Retail and Wholesale', 'title' => 'Wholesale Distributors'],
            ['category' => 'Retail and Wholesale', 'title' => 'E-commerce Businesses'],
            ['category' => 'Retail and Wholesale', 'title' => 'Franchises (e.g., chain stores, fast food outlets)'],
            ['category' => 'Retail and Wholesale', 'title' => 'Market Stalls and Small Vendors'],

            // 4. Transportation and Logistics
            ['category' => 'Transportation and Logistics', 'title' => 'Freight and Cargo Services'],
            ['category' => 'Transportation and Logistics', 'title' => 'Courier and Delivery Companies'],
            ['category' => 'Transportation and Logistics', 'title' => 'Moving and Storage Services'],
            ['category' => 'Transportation and Logistics', 'title' => 'Passenger Transport (e.g., taxi, rideshare, bus)'],
            ['category' => 'Transportation and Logistics', 'title' => 'Logistics and Supply Chain Management'],

            // 5. Hospitality and Food Services
            ['category' => 'Hospitality and Food Services', 'title' => 'Restaurants, Cafés, and Bakeries'],
            ['category' => 'Hospitality and Food Services', 'title' => 'Catering Companies'],
            ['category' => 'Hospitality and Food Services', 'title' => 'Hotels and Resorts'],
            ['category' => 'Hospitality and Food Services', 'title' => 'Event and Conference Centers'],
            ['category' => 'Hospitality and Food Services', 'title' => 'Travel Agencies and Tour Operators'],

            // 6. Healthcare and Social Services
            ['category' => 'Healthcare and Social Services', 'title' => 'Private Clinics and Medical Practices'],
            ['category' => 'Healthcare and Social Services', 'title' => 'Dental Practices'],
            ['category' => 'Healthcare and Social Services', 'title' => 'Pharmacies'],
            ['category' => 'Healthcare and Social Services', 'title' => 'Diagnostic and Laboratory Services'],
            ['category' => 'Healthcare and Social Services', 'title' => 'Home Healthcare Providers'],
            ['category' => 'Healthcare and Social Services', 'title' => 'Childcare and Elder Care Services'],

            // 7. Professional and Technical Services
            ['category' => 'Professional and Technical Services', 'title' => 'Consulting Firms (e.g., business, engineering, legal)'],
            ['category' => 'Professional and Technical Services', 'title' => 'Accounting and Financial Advisory Services'],
            ['category' => 'Professional and Technical Services', 'title' => 'Marketing and Advertising Agencies'],
            ['category' => 'Professional and Technical Services', 'title' => 'Design and Creative Studios'],
            ['category' => 'Professional and Technical Services', 'title' => 'Research and Development Firms'],
            ['category' => 'Professional and Technical Services', 'title' => 'IT and Software Development Companies'],

            // 8. Financial and Insurance Services
            ['category' => 'Financial and Insurance Services', 'title' => 'Banks and Credit Unions'],
            ['category' => 'Financial and Insurance Services', 'title' => 'Insurance Companies'],
            ['category' => 'Financial and Insurance Services', 'title' => 'Investment and Asset Management Firms'],
            ['category' => 'Financial and Insurance Services', 'title' => 'Mortgage Brokers'],
            ['category' => 'Financial and Insurance Services', 'title' => 'Financial Planning and Advisory Services'],

            // 9. Agriculture and Natural Resources
            ['category' => 'Agriculture and Natural Resources', 'title' => 'Crop Farming'],
            ['category' => 'Agriculture and Natural Resources', 'title' => 'Livestock Farming'],
            ['category' => 'Agriculture and Natural Resources', 'title' => 'Fisheries and Aquaculture'],
            ['category' => 'Agriculture and Natural Resources', 'title' => 'Forestry and Timber Businesses'],
            ['category' => 'Agriculture and Natural Resources', 'title' => 'Mining and Resource Extraction'],
            ['category' => 'Agriculture and Natural Resources', 'title' => 'Agricultural Supply and Equipment'],

            // 10. Energy and Utilities
            ['category' => 'Energy and Utilities', 'title' => 'Power Generation Companies (e.g., renewable, fossil fuel)'],
            ['category' => 'Energy and Utilities', 'title' => 'Water and Waste Management Services'],
            ['category' => 'Energy and Utilities', 'title' => 'Oil and Gas Exploration and Distribution'],
            ['category' => 'Energy and Utilities', 'title' => 'Renewable Energy Firms (e.g., solar, wind)'],

            // 11. Education and Training
            ['category' => 'Education and Training', 'title' => 'Schools and Colleges (private institutions)'],
            ['category' => 'Education and Training', 'title' => 'Vocational and Technical Training Centers'],
            ['category' => 'Education and Training', 'title' => 'Tutoring Services'],
            ['category' => 'Education and Training', 'title' => 'Corporate Training and Development Firms'],
            ['category' => 'Education and Training', 'title' => 'Online Education Platforms'],

            // 12. Arts, Entertainment, and Media
            ['category' => 'Arts, Entertainment, and Media', 'title' => 'Film and Television Production'],
            ['category' => 'Arts, Entertainment, and Media', 'title' => 'Music and Performing Arts Companies'],
            ['category' => 'Arts, Entertainment, and Media', 'title' => 'Publishing Houses'],
            ['category' => 'Arts, Entertainment, and Media', 'title' => 'Digital Media and Content Creation'],
            ['category' => 'Arts, Entertainment, and Media', 'title' => 'Event Management and Entertainment Services'],
            ['category' => 'Arts, Entertainment, and Media', 'title' => 'Gaming and Animation Studios'],

            // 13. Temples & Worship Centers
            ['category' => 'Temples & Worship Centers', 'title' => 'Temple & Ashram Management'],
            ['category' => 'Temples & Worship Centers', 'title' => 'Daily Puja & Ritual Services'],
            ['category' => 'Temples & Worship Centers', 'title' => 'Festival & Special Puja Arrangements'],
            ['category' => 'Temples & Worship Centers', 'title' => 'Bhajan/Kirtan Groups'],
            ['category' => 'Temples & Worship Centers', 'title' => 'Spiritual Retreat & Meditation Camps'],

            // 14. Religious Education & Training Centers
            ['category' => 'Religious Education & Training Centers', 'title' => 'Gita/Bhagavatam Study Classes'],
            ['category' => 'Religious Education & Training Centers', 'title' => 'Sanskrit & Shloka Training'],
            ['category' => 'Religious Education & Training Centers', 'title' => 'Children\'s Dharma School'],
            ['category' => 'Religious Education & Training Centers', 'title' => 'Youth Dharma Training Programs'],
            ['category' => 'Religious Education & Training Centers', 'title' => 'Vedic Philosophy Workshops'],

            // 15. Cultural & Spiritual Organizations
            ['category' => 'Cultural & Spiritual Organizations', 'title' => 'Yoga & Meditation Centers'],
            ['category' => 'Cultural & Spiritual Organizations', 'title' => 'Cultural Dance & Music Groups'],
            ['category' => 'Cultural & Spiritual Organizations', 'title' => 'Spiritual Discussion Circles'],
            ['category' => 'Cultural & Spiritual Organizations', 'title' => 'Wellness Programs'],
            ['category' => 'Cultural & Spiritual Organizations', 'title' => 'Hindu Youth Cultural Clubs'],

            // 16. Charity & Seva Organizations
            ['category' => 'Charity & Seva Organizations', 'title' => 'Food Donation Programs'],
            ['category' => 'Charity & Seva Organizations', 'title' => 'Medical & Health Camps'],
            ['category' => 'Charity & Seva Organizations', 'title' => 'Disaster Relief Teams'],
            ['category' => 'Charity & Seva Organizations', 'title' => 'Gau Seva Groups'],
            ['category' => 'Charity & Seva Organizations', 'title' => 'Community Support & Counseling'],

            // 17. Religious Event & Pilgrimage Management
            ['category' => 'Religious Event & Pilgrimage Management', 'title' => 'Festival Organizing Committees'],
            ['category' => 'Religious Event & Pilgrimage Management', 'title' => 'Rath Yatra Management'],
            ['category' => 'Religious Event & Pilgrimage Management', 'title' => 'Pilgrimage Coordination'],
            ['category' => 'Religious Event & Pilgrimage Management', 'title' => 'Temple Event Logistics'],
            ['category' => 'Religious Event & Pilgrimage Management', 'title' => 'Volunteer Event Teams'],

            // 18. Hindu Community & Social Organizations
            ['category' => 'Hindu Community & Social Organizations', 'title' => 'Hindu Community Centers'],
            ['category' => 'Hindu Community & Social Organizations', 'title' => 'Family Support Groups'],
            ['category' => 'Hindu Community & Social Organizations', 'title' => 'Interfaith Harmony Groups'],
            ['category' => 'Hindu Community & Social Organizations', 'title' => 'Hindu Council Activities'],
            ['category' => 'Hindu Community & Social Organizations', 'title' => 'Community Awareness Programs'],

            // 19. Youth & Volunteer Organizations
            ['category' => 'Youth & Volunteer Organizations', 'title' => 'Hindu Yuva Sangha'],
            ['category' => 'Youth & Volunteer Organizations', 'title' => 'Student Dharma Groups'],
            ['category' => 'Youth & Volunteer Organizations', 'title' => 'Volunteer Service Teams'],
            ['category' => 'Youth & Volunteer Organizations', 'title' => 'Leadership Development Camps'],
            ['category' => 'Youth & Volunteer Organizations', 'title' => 'Cultural & Sports Activities'],
        ];

        foreach ($businesses as $data) {
            $category = BusinessCategory::where('name', $data['category'])->first();

            if ($category) {
                Business::create([
                    'business_category_id' => $category->id,
                    'title' => $data['title'],
                ]);
            }
        }
    }
}
