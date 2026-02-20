<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $skills = [
            // Programming Languages
            ['name' => 'JavaScript', 'category' => 'Programming Language', 'icon' => 'fab fa-js'],
            ['name' => 'Python', 'category' => 'Programming Language', 'icon' => 'fab fa-python'],
            ['name' => 'Java', 'category' => 'Programming Language', 'icon' => 'fab fa-java'],
            ['name' => 'PHP', 'category' => 'Programming Language', 'icon' => 'fab fa-php'],
            ['name' => 'C++', 'category' => 'Programming Language', 'icon' => 'fas fa-code'],
            ['name' => 'C#', 'category' => 'Programming Language', 'icon' => 'fas fa-code'],
            ['name' => 'Ruby', 'category' => 'Programming Language', 'icon' => 'fas fa-gem'],
            ['name' => 'Go', 'category' => 'Programming Language', 'icon' => 'fas fa-code'],
            ['name' => 'TypeScript', 'category' => 'Programming Language', 'icon' => 'fas fa-code'],
            ['name' => 'Swift', 'category' => 'Programming Language', 'icon' => 'fab fa-swift'],
            ['name' => 'Kotlin', 'category' => 'Programming Language', 'icon' => 'fas fa-code'],
            ['name' => 'Rust', 'category' => 'Programming Language', 'icon' => 'fas fa-code'],

            // Frontend Frameworks & Libraries
            ['name' => 'React', 'category' => 'Frontend Framework', 'icon' => 'fab fa-react'],
            ['name' => 'Vue.js', 'category' => 'Frontend Framework', 'icon' => 'fab fa-vuejs'],
            ['name' => 'Angular', 'category' => 'Frontend Framework', 'icon' => 'fab fa-angular'],
            ['name' => 'Next.js', 'category' => 'Frontend Framework', 'icon' => 'fas fa-code'],
            ['name' => 'Svelte', 'category' => 'Frontend Framework', 'icon' => 'fas fa-code'],
            ['name' => 'jQuery', 'category' => 'Frontend Library', 'icon' => 'fas fa-code'],

            // Backend Frameworks
            ['name' => 'Laravel', 'category' => 'Backend Framework', 'icon' => 'fab fa-laravel'],
            ['name' => 'Node.js', 'category' => 'Backend Framework', 'icon' => 'fab fa-node-js'],
            ['name' => 'Express.js', 'category' => 'Backend Framework', 'icon' => 'fab fa-node'],
            ['name' => 'Django', 'category' => 'Backend Framework', 'icon' => 'fas fa-code'],
            ['name' => 'Flask', 'category' => 'Backend Framework', 'icon' => 'fas fa-code'],
            ['name' => 'Spring Boot', 'category' => 'Backend Framework', 'icon' => 'fas fa-leaf'],
            ['name' => 'ASP.NET', 'category' => 'Backend Framework', 'icon' => 'fas fa-code'],
            ['name' => 'Ruby on Rails', 'category' => 'Backend Framework', 'icon' => 'fas fa-gem'],

            // Databases
            ['name' => 'MySQL', 'category' => 'Database', 'icon' => 'fas fa-database'],
            ['name' => 'PostgreSQL', 'category' => 'Database', 'icon' => 'fas fa-database'],
            ['name' => 'MongoDB', 'category' => 'Database', 'icon' => 'fas fa-database'],
            ['name' => 'Redis', 'category' => 'Database', 'icon' => 'fas fa-database'],
            ['name' => 'SQLite', 'category' => 'Database', 'icon' => 'fas fa-database'],
            ['name' => 'Oracle', 'category' => 'Database', 'icon' => 'fas fa-database'],
            ['name' => 'Microsoft SQL Server', 'category' => 'Database', 'icon' => 'fas fa-database'],
            ['name' => 'Firebase', 'category' => 'Database', 'icon' => 'fas fa-fire'],

            // DevOps & Cloud
            ['name' => 'Docker', 'category' => 'DevOps', 'icon' => 'fab fa-docker'],
            ['name' => 'Kubernetes', 'category' => 'DevOps', 'icon' => 'fas fa-dharmachakra'],
            ['name' => 'AWS', 'category' => 'Cloud Platform', 'icon' => 'fab fa-aws'],
            ['name' => 'Azure', 'category' => 'Cloud Platform', 'icon' => 'fab fa-microsoft'],
            ['name' => 'Google Cloud', 'category' => 'Cloud Platform', 'icon' => 'fab fa-google'],
            ['name' => 'Jenkins', 'category' => 'DevOps', 'icon' => 'fab fa-jenkins'],
            ['name' => 'GitLab CI/CD', 'category' => 'DevOps', 'icon' => 'fab fa-gitlab'],
            ['name' => 'GitHub Actions', 'category' => 'DevOps', 'icon' => 'fab fa-github'],

            // Version Control
            ['name' => 'Git', 'category' => 'Version Control', 'icon' => 'fab fa-git-alt'],
            ['name' => 'GitHub', 'category' => 'Version Control', 'icon' => 'fab fa-github'],
            ['name' => 'GitLab', 'category' => 'Version Control', 'icon' => 'fab fa-gitlab'],
            ['name' => 'Bitbucket', 'category' => 'Version Control', 'icon' => 'fab fa-bitbucket'],

            // Mobile Development
            ['name' => 'React Native', 'category' => 'Mobile Development', 'icon' => 'fab fa-react'],
            ['name' => 'Flutter', 'category' => 'Mobile Development', 'icon' => 'fas fa-mobile-alt'],
            ['name' => 'iOS Development', 'category' => 'Mobile Development', 'icon' => 'fab fa-apple'],
            ['name' => 'Android Development', 'category' => 'Mobile Development', 'icon' => 'fab fa-android'],

            // Web Technologies
            ['name' => 'HTML5', 'category' => 'Web Technology', 'icon' => 'fab fa-html5'],
            ['name' => 'CSS3', 'category' => 'Web Technology', 'icon' => 'fab fa-css3-alt'],
            ['name' => 'Sass/SCSS', 'category' => 'Web Technology', 'icon' => 'fab fa-sass'],
            ['name' => 'Tailwind CSS', 'category' => 'Web Technology', 'icon' => 'fas fa-wind'],
            ['name' => 'Bootstrap', 'category' => 'Web Technology', 'icon' => 'fab fa-bootstrap'],
            ['name' => 'REST API', 'category' => 'Web Technology', 'icon' => 'fas fa-exchange-alt'],
            ['name' => 'GraphQL', 'category' => 'Web Technology', 'icon' => 'fas fa-project-diagram'],
            ['name' => 'WebSocket', 'category' => 'Web Technology', 'icon' => 'fas fa-plug'],

            // Data Science & AI
            ['name' => 'Machine Learning', 'category' => 'Data Science', 'icon' => 'fas fa-brain'],
            ['name' => 'Deep Learning', 'category' => 'Data Science', 'icon' => 'fas fa-brain'],
            ['name' => 'TensorFlow', 'category' => 'Data Science', 'icon' => 'fas fa-brain'],
            ['name' => 'PyTorch', 'category' => 'Data Science', 'icon' => 'fas fa-brain'],
            ['name' => 'Data Analysis', 'category' => 'Data Science', 'icon' => 'fas fa-chart-line'],
            ['name' => 'Data Visualization', 'category' => 'Data Science', 'icon' => 'fas fa-chart-bar'],
            ['name' => 'Pandas', 'category' => 'Data Science', 'icon' => 'fas fa-table'],
            ['name' => 'NumPy', 'category' => 'Data Science', 'icon' => 'fas fa-calculator'],

            // Testing
            ['name' => 'Unit Testing', 'category' => 'Testing', 'icon' => 'fas fa-vial'],
            ['name' => 'Jest', 'category' => 'Testing', 'icon' => 'fas fa-vial'],
            ['name' => 'PHPUnit', 'category' => 'Testing', 'icon' => 'fas fa-vial'],
            ['name' => 'Selenium', 'category' => 'Testing', 'icon' => 'fas fa-vial'],
            ['name' => 'Cypress', 'category' => 'Testing', 'icon' => 'fas fa-vial'],

            // Design & UI/UX
            ['name' => 'UI/UX Design', 'category' => 'Design', 'icon' => 'fas fa-paint-brush'],
            ['name' => 'Figma', 'category' => 'Design', 'icon' => 'fab fa-figma'],
            ['name' => 'Adobe XD', 'category' => 'Design', 'icon' => 'fas fa-paint-brush'],
            ['name' => 'Photoshop', 'category' => 'Design', 'icon' => 'fas fa-image'],
            ['name' => 'Illustrator', 'category' => 'Design', 'icon' => 'fas fa-palette'],

            // Soft Skills
            ['name' => 'Team Collaboration', 'category' => 'Soft Skill', 'icon' => 'fas fa-users'],
            ['name' => 'Problem Solving', 'category' => 'Soft Skill', 'icon' => 'fas fa-lightbulb'],
            ['name' => 'Communication', 'category' => 'Soft Skill', 'icon' => 'fas fa-comments'],
            ['name' => 'Leadership', 'category' => 'Soft Skill', 'icon' => 'fas fa-user-tie'],
            ['name' => 'Time Management', 'category' => 'Soft Skill', 'icon' => 'fas fa-clock'],
            ['name' => 'Critical Thinking', 'category' => 'Soft Skill', 'icon' => 'fas fa-brain'],
            ['name' => 'Adaptability', 'category' => 'Soft Skill', 'icon' => 'fas fa-random'],
            ['name' => 'Project Management', 'category' => 'Soft Skill', 'icon' => 'fas fa-tasks'],

            // Other Tools
            ['name' => 'VS Code', 'category' => 'Tool', 'icon' => 'fas fa-code'],
            ['name' => 'Postman', 'category' => 'Tool', 'icon' => 'fas fa-paper-plane'],
            ['name' => 'Jira', 'category' => 'Tool', 'icon' => 'fab fa-jira'],
            ['name' => 'Trello', 'category' => 'Tool', 'icon' => 'fab fa-trello'],
            ['name' => 'Slack', 'category' => 'Tool', 'icon' => 'fab fa-slack'],
            ['name' => 'Linux', 'category' => 'Operating System', 'icon' => 'fab fa-linux'],
            ['name' => 'Windows', 'category' => 'Operating System', 'icon' => 'fab fa-windows'],
            ['name' => 'macOS', 'category' => 'Operating System', 'icon' => 'fab fa-apple'],

            // Business & Management
            ['name' => 'Business Strategy', 'category' => 'Business', 'icon' => 'fas fa-chess'],
            ['name' => 'Business Development', 'category' => 'Business', 'icon' => 'fas fa-chart-line'],
            ['name' => 'Strategic Planning', 'category' => 'Business', 'icon' => 'fas fa-sitemap'],
            ['name' => 'Business Analysis', 'category' => 'Business', 'icon' => 'fas fa-chart-pie'],
            ['name' => 'Market Research', 'category' => 'Business', 'icon' => 'fas fa-search-dollar'],
            ['name' => 'Competitive Analysis', 'category' => 'Business', 'icon' => 'fas fa-balance-scale'],
            ['name' => 'Risk Management', 'category' => 'Business', 'icon' => 'fas fa-shield-alt'],
            ['name' => 'Operations Management', 'category' => 'Business', 'icon' => 'fas fa-cogs'],
            ['name' => 'Supply Chain Management', 'category' => 'Business', 'icon' => 'fas fa-truck'],
            ['name' => 'Process Improvement', 'category' => 'Business', 'icon' => 'fas fa-sync'],
            ['name' => 'Entrepreneurship', 'category' => 'Business', 'icon' => 'fas fa-rocket'],

            // Finance & Accounting
            ['name' => 'Financial Analysis', 'category' => 'Finance', 'icon' => 'fas fa-money-check-alt'],
            ['name' => 'Financial Planning', 'category' => 'Finance', 'icon' => 'fas fa-calculator'],
            ['name' => 'Budgeting', 'category' => 'Finance', 'icon' => 'fas fa-file-invoice-dollar'],
            ['name' => 'Financial Modeling', 'category' => 'Finance', 'icon' => 'fas fa-chart-area'],
            ['name' => 'Investment Analysis', 'category' => 'Finance', 'icon' => 'fas fa-hand-holding-usd'],
            ['name' => 'Accounting', 'category' => 'Finance', 'icon' => 'fas fa-coins'],
            ['name' => 'Tax Planning', 'category' => 'Finance', 'icon' => 'fas fa-receipt'],
            ['name' => 'Auditing', 'category' => 'Finance', 'icon' => 'fas fa-clipboard-check'],
            ['name' => 'Excel (Advanced)', 'category' => 'Finance', 'icon' => 'fas fa-file-excel'],
            ['name' => 'QuickBooks', 'category' => 'Finance', 'icon' => 'fas fa-book'],
            ['name' => 'SAP Finance', 'category' => 'Finance', 'icon' => 'fas fa-database'],
            ['name' => 'Oracle Financials', 'category' => 'Finance', 'icon' => 'fas fa-database'],

            // Marketing & Sales
            ['name' => 'Digital Marketing', 'category' => 'Marketing', 'icon' => 'fas fa-bullhorn'],
            ['name' => 'Social Media Marketing', 'category' => 'Marketing', 'icon' => 'fas fa-hashtag'],
            ['name' => 'Content Marketing', 'category' => 'Marketing', 'icon' => 'fas fa-pen-fancy'],
            ['name' => 'SEO/SEM', 'category' => 'Marketing', 'icon' => 'fas fa-search'],
            ['name' => 'Email Marketing', 'category' => 'Marketing', 'icon' => 'fas fa-envelope'],
            ['name' => 'Brand Management', 'category' => 'Marketing', 'icon' => 'fas fa-tag'],
            ['name' => 'Marketing Analytics', 'category' => 'Marketing', 'icon' => 'fas fa-chart-bar'],
            ['name' => 'Google Analytics', 'category' => 'Marketing', 'icon' => 'fab fa-google'],
            ['name' => 'Google Ads', 'category' => 'Marketing', 'icon' => 'fab fa-google'],
            ['name' => 'Facebook Ads', 'category' => 'Marketing', 'icon' => 'fab fa-facebook'],
            ['name' => 'CRM Systems', 'category' => 'Marketing', 'icon' => 'fas fa-user-friends'],
            ['name' => 'Salesforce', 'category' => 'Marketing', 'icon' => 'fab fa-salesforce'],
            ['name' => 'HubSpot', 'category' => 'Marketing', 'icon' => 'fas fa-hubspot'],
            ['name' => 'Copywriting', 'category' => 'Marketing', 'icon' => 'fas fa-edit'],
            ['name' => 'Sales Strategy', 'category' => 'Sales', 'icon' => 'fas fa-handshake'],
            ['name' => 'Negotiation', 'category' => 'Sales', 'icon' => 'fas fa-comments-dollar'],
            ['name' => 'Customer Relationship Management', 'category' => 'Sales', 'icon' => 'fas fa-user-circle'],
            ['name' => 'Lead Generation', 'category' => 'Sales', 'icon' => 'fas fa-user-plus'],

            // Human Resources
            ['name' => 'Recruitment', 'category' => 'Human Resources', 'icon' => 'fas fa-user-check'],
            ['name' => 'Talent Acquisition', 'category' => 'Human Resources', 'icon' => 'fas fa-users-cog'],
            ['name' => 'Employee Relations', 'category' => 'Human Resources', 'icon' => 'fas fa-user-friends'],
            ['name' => 'Performance Management', 'category' => 'Human Resources', 'icon' => 'fas fa-tasks'],
            ['name' => 'Training & Development', 'category' => 'Human Resources', 'icon' => 'fas fa-chalkboard-teacher'],
            ['name' => 'Compensation & Benefits', 'category' => 'Human Resources', 'icon' => 'fas fa-money-bill-wave'],
            ['name' => 'HR Analytics', 'category' => 'Human Resources', 'icon' => 'fas fa-chart-line'],
            ['name' => 'Organizational Development', 'category' => 'Human Resources', 'icon' => 'fas fa-sitemap'],
            ['name' => 'Conflict Resolution', 'category' => 'Human Resources', 'icon' => 'fas fa-balance-scale'],
            ['name' => 'Onboarding', 'category' => 'Human Resources', 'icon' => 'fas fa-door-open'],
            ['name' => 'HRIS Systems', 'category' => 'Human Resources', 'icon' => 'fas fa-database'],
            ['name' => 'Labor Law', 'category' => 'Human Resources', 'icon' => 'fas fa-gavel'],

            // Healthcare & Medical
            ['name' => 'Patient Care', 'category' => 'Healthcare', 'icon' => 'fas fa-heartbeat'],
            ['name' => 'Medical Terminology', 'category' => 'Healthcare', 'icon' => 'fas fa-book-medical'],
            ['name' => 'Clinical Research', 'category' => 'Healthcare', 'icon' => 'fas fa-microscope'],
            ['name' => 'Healthcare Administration', 'category' => 'Healthcare', 'icon' => 'fas fa-hospital'],
            ['name' => 'Medical Coding', 'category' => 'Healthcare', 'icon' => 'fas fa-file-medical-alt'],
            ['name' => 'Electronic Health Records', 'category' => 'Healthcare', 'icon' => 'fas fa-laptop-medical'],
            ['name' => 'Pharmacology', 'category' => 'Healthcare', 'icon' => 'fas fa-pills'],
            ['name' => 'Public Health', 'category' => 'Healthcare', 'icon' => 'fas fa-globe'],

            // Education & Teaching
            ['name' => 'Curriculum Development', 'category' => 'Education', 'icon' => 'fas fa-book-open'],
            ['name' => 'Instructional Design', 'category' => 'Education', 'icon' => 'fas fa-chalkboard'],
            ['name' => 'Classroom Management', 'category' => 'Education', 'icon' => 'fas fa-users'],
            ['name' => 'E-Learning', 'category' => 'Education', 'icon' => 'fas fa-laptop'],
            ['name' => 'Educational Technology', 'category' => 'Education', 'icon' => 'fas fa-graduation-cap'],
            ['name' => 'Tutoring', 'category' => 'Education', 'icon' => 'fas fa-user-graduate'],
            ['name' => 'Assessment & Evaluation', 'category' => 'Education', 'icon' => 'fas fa-clipboard-list'],

            // Law & Legal
            ['name' => 'Legal Research', 'category' => 'Legal', 'icon' => 'fas fa-balance-scale'],
            ['name' => 'Contract Law', 'category' => 'Legal', 'icon' => 'fas fa-file-contract'],
            ['name' => 'Compliance', 'category' => 'Legal', 'icon' => 'fas fa-check-circle'],
            ['name' => 'Legal Writing', 'category' => 'Legal', 'icon' => 'fas fa-pen-nib'],
            ['name' => 'Corporate Law', 'category' => 'Legal', 'icon' => 'fas fa-building'],
            ['name' => 'Intellectual Property', 'category' => 'Legal', 'icon' => 'fas fa-copyright'],
            ['name' => 'Litigation', 'category' => 'Legal', 'icon' => 'fas fa-gavel'],

            // Media & Communications
            ['name' => 'Public Relations', 'category' => 'Communications', 'icon' => 'fas fa-bullhorn'],
            ['name' => 'Corporate Communications', 'category' => 'Communications', 'icon' => 'fas fa-building'],
            ['name' => 'Journalism', 'category' => 'Communications', 'icon' => 'fas fa-newspaper'],
            ['name' => 'Video Editing', 'category' => 'Media', 'icon' => 'fas fa-video'],
            ['name' => 'Photography', 'category' => 'Media', 'icon' => 'fas fa-camera'],
            ['name' => 'Content Creation', 'category' => 'Media', 'icon' => 'fas fa-pen'],
            ['name' => 'Podcasting', 'category' => 'Media', 'icon' => 'fas fa-podcast'],
            ['name' => 'Broadcasting', 'category' => 'Media', 'icon' => 'fas fa-broadcast-tower'],

            // Customer Service
            ['name' => 'Customer Support', 'category' => 'Customer Service', 'icon' => 'fas fa-headset'],
            ['name' => 'Client Relations', 'category' => 'Customer Service', 'icon' => 'fas fa-handshake'],
            ['name' => 'Help Desk', 'category' => 'Customer Service', 'icon' => 'fas fa-question-circle'],
            ['name' => 'Technical Support', 'category' => 'Customer Service', 'icon' => 'fas fa-tools'],
            ['name' => 'Customer Satisfaction', 'category' => 'Customer Service', 'icon' => 'fas fa-smile'],

            // Hospitality & Tourism
            ['name' => 'Hotel Management', 'category' => 'Hospitality', 'icon' => 'fas fa-hotel'],
            ['name' => 'Event Planning', 'category' => 'Hospitality', 'icon' => 'fas fa-calendar-alt'],
            ['name' => 'Food & Beverage Management', 'category' => 'Hospitality', 'icon' => 'fas fa-utensils'],
            ['name' => 'Tourism Management', 'category' => 'Tourism', 'icon' => 'fas fa-plane'],
            ['name' => 'Guest Relations', 'category' => 'Hospitality', 'icon' => 'fas fa-concierge-bell'],

            // Real Estate
            ['name' => 'Real Estate Sales', 'category' => 'Real Estate', 'icon' => 'fas fa-home'],
            ['name' => 'Property Management', 'category' => 'Real Estate', 'icon' => 'fas fa-building'],
            ['name' => 'Real Estate Valuation', 'category' => 'Real Estate', 'icon' => 'fas fa-calculator'],
            ['name' => 'Real Estate Marketing', 'category' => 'Real Estate', 'icon' => 'fas fa-ad'],

            // Quality & Compliance
            ['name' => 'Quality Assurance', 'category' => 'Quality Management', 'icon' => 'fas fa-check-double'],
            ['name' => 'Quality Control', 'category' => 'Quality Management', 'icon' => 'fas fa-clipboard-check'],
            ['name' => 'Six Sigma', 'category' => 'Quality Management', 'icon' => 'fas fa-chart-line'],
            ['name' => 'ISO Standards', 'category' => 'Quality Management', 'icon' => 'fas fa-certificate'],
            ['name' => 'Regulatory Compliance', 'category' => 'Compliance', 'icon' => 'fas fa-clipboard-list'],
        ];

        // Add timestamps and is_active to each skill
        foreach ($skills as &$skill) {
            $skill['is_active'] = true;
            $skill['created_at'] = $now;
            $skill['updated_at'] = $now;
        }

        DB::table('skills')->insert($skills);
    }
}
