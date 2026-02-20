<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobCategory;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Accounting/Finance',
            'Bank/ Non-Bank Fin. Institution',
            'Supply Chain/ Procurement',
            'Education/Training',
            'Engineer/Architects',
            'Garments/Textile',
            'HR/Org. Development',
            'Gen Mgt/Admin',
            'Healthcare/Medical',
            'Data Entry/Computer Operator',
            'Mechanic/Technician',
            'Nurse',
            'Delivery Man',
            'Graphic Designer',
            'CAD Operator',
            'Plumber/Pipe fitting',
            'Mason/ Construction worker',
            'Gardener',
            'Imam/ Khatib/ Muezzin',
            'Boiler Operator',
            'Production/Operation',
            'Hospitality/ Travel/ Tourism',
            'Commercial',
            'IT & Telecommunication',
            'Marketing/Sales',
            'Customer Service/Call Centre',
            'Media/Ad./Event Mgt.',
            'Pharmaceutical',
            'Electrician/Electronics Technician',
            'Driver',
            'Chef/Cook',
            'Peon',
            'Sales Representative (SR)',
            'Caregiver/Nanny',
            'Housekeeper',
            'Sewing machine operator',
            'Gym/ Fitness Trainer',
            'Interpreter',
            'Carpenter',
            'Others',
            'Agro (Plant/Animal/Fisheries)',
            'NGO/Development',
            'Research/Consultancy',
            'Receptionist/ PS',
            'Data Entry/Operator/BPO',
            'Design/Creative',
            'Security/Support Service',
            'Law/Legal',
            'Company Secretary/Regulatory ...',
            'Pathologist/ Lab Assistant',
            'Security Guard',
            'Waiter/Waitress',
            'Showroom Assistant/Salesman',
            'Garments technician/Machine ...',
            'Welder',
            'Cleaner',
            'Beautician/ Salon Worker',
            'Fire Safety/ Firefighter',
            'Physiotherapist',
        ];

        foreach ($categories as $name) {
            JobCategory::firstOrCreate(['name' => $name]);
        }
    }
}
