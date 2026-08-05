<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Creating super admin user
        $superAdmin = User::create([
            'fname' => 'Super',
            'lname' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '01700000000',
            'password' => bcrypt('admin12'),
        ]);

        // Creating developer user
        $developer = User::create([
            'fname' => 'Developer',
            'lname' => 'OP',
            'email' => 'dev@gmail.com',
            'phone' => '01781342259',
            'password' => bcrypt('dev12'),
        ]);

        // Creating roles
        Role::firstOrCreate(['name' => 'Admin',        'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Operator',     'guard_name' => 'web']);

        // Creating settings
        Setting::create([
            'site_name' => 'Cholo Abroad',
            'site_title' => 'Cholo Abroad — Study & Visa Consultants',
            'logo' => null,
            'favicon' => null,
            'email' => 'info@choloabroad.com',
            'phone' => '+8801887-275766',
            'address' => 'House 14, Road 9, Sector 4, Uttara, Dhaka 1230, Bangladesh',
            'footer_text' => '© ' . date('Y') . ' Cholo Abroad — স্বপ্ন বিদেশে, শিকড় এদেশে. All rights reserved.',
            'footer_description' => 'Study, work, and settlement visa consultancy helping Bangladeshi students and professionals move abroad with confidence.',
            'newslatter_text' => 'Get weekly visa tips and intake alerts straight to your inbox.',
            'facebook' => 'https://www.facebook.com/choloabroad',
            'youtube' => 'https://www.youtube.com/@Cholo_Abroad',
            'linkedin' => 'https://www.linkedin.com/company/cholo-abroad',
            'instagram' => 'https://www.instagram.com/cholo_abroad',
            'privacy_policy' => '<h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">1. Introduction</h3><p>At Cholo Abroad, we are committed to protecting your privacy. This Privacy Policy outlines how we collect, use, and safeguard your personal information when you use our services.</p><h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">2. Information We Collect</h3><p>We collect information that you voluntarily provide when applying for visas, requesting consultancy services, or contacting us. This may include your name, contact details, educational background, and passport information.</p><h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">3. How We Use Your Information</h3><p>Your information is used strictly to provide you with visa and study abroad consultancy services. We may also use it to communicate with you about your application status and updates regarding our services.</p><h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">4. Data Security</h3><p>We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p><h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">5. Contact Us</h3><p>If you have any questions or concerns about this Privacy Policy, please contact us at <a href="mailto:hello@choloabroad.com" style="color: var(--sky); font-weight: 600;">hello@choloabroad.com</a>.</p>',
            'terms_and_conditions' => '<h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">1. Acceptance of Terms</h3><p>By accessing or using the services provided by Cholo Abroad, you agree to be bound by these Terms of Service. If you disagree with any part of the terms, you may not access our services.</p><h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">2. Services Provided</h3><p>We provide consultancy, guidance, and assistance with university admissions and visa applications for studying and working abroad. The final decision on university admissions and visa approvals rests solely with the respective institutions and government authorities.</p><h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">3. User Responsibilities</h3><p>You agree to provide accurate, complete, and updated information for your applications. You are responsible for ensuring that all documents submitted are genuine and valid.</p><h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">4. Limitation of Liability</h3><p>Cholo Abroad shall not be held liable for any rejection of university applications or visa denials, as these decisions are entirely beyond our control.</p><h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">5. Changes to Terms</h3><p>We reserve the right to modify or replace these Terms of Service at any time. We will try to provide at least 30 days\' notice prior to any new terms taking effect.</p>',
            'countries_title' => 'Where do you want to <span style="color:var(--sky)">land</span>?',
            'countries_subtitle' => 'Every country has its own visa track, intake season, and cost of living. Explore the destination that fits your goal.',
            'services_title' => 'Every step of the file, <span style="color:var(--sky)">handled</span>',
            'services_subtitle' => 'Pick a single service or let one counsellor run the whole route — shortlisting to landing.',
            'process_title' => 'From first call to boarding pass',
            'process_subtitle' => 'A fixed four-step process — you always know what stage your file is at.',
            'about_title' => 'We\'ve filed the paperwork <span style="color:var(--sky)">so you don\'t have to</span>',
            'about_subtitle' => 'Cholo Abroad started with one frustration: visa consulting in Bangladesh was slow, opaque, and split across too many hands. We built the counsellor-owns-the-file model to fix that.',
            'testimonials_title' => 'Students who trusted us with their future',
            'testimonials_subtitle' => null,
            'faq_title' => 'Frequently Asked <span style="color:var(--sky)">Questions</span>',
            'faq_subtitle' => 'Everything you need to know about our services, visa processes, and what to expect when you apply with us.',
            'contact_title' => 'Talk to a <span style="color:var(--sky)">counsellor</span> directly',
            'contact_subtitle' => 'Visit our Dhaka office, call, or send a message — we reply within one business day.',
            'partners_title' => 'Our Global University Partners',
            'partners_subtitle' => 'We collaborate with top-tier institutions worldwide to bring you the best educational opportunities and support your journey from start to finish.',
        ]);

        // Assigning roles to users
        $superAdmin->assignRole('Admin');
        $developer->assignRole('Admin');

        // Call Seeders
        $this->call([
            RolePermissionSeeder::class,
            HeroSeeder::class,
            CountrySeeder::class,
            ServiceSeeder::class,
            ProcessSeeder::class,
            TestimonialSeeder::class,
            CtaSeeder::class,
            AboutUsSeeder::class,
            FaqSeeder::class,
            PartnerSeeder::class,
        ]);
    }
}
