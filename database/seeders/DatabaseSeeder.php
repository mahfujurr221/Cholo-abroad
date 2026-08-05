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
            'site_name'       => 'Cholo Abroad',
            'site_title'      => 'Cholo Abroad — Study & Visa Consultants',
            'logo'            => null,
            'favicon'         => null,
            'email'           => 'hello@choloabroad.com',
            'phone'           => '+880 1700-000000',
            'address'         => 'House 14, Road 9, Sector 4, Uttara, Dhaka 1230, Bangladesh',
            'footer_text'     => '© ' . date('Y') . ' Cholo Abroad. All rights reserved.',
            'newslatter_text' => 'Get weekly visa tips and intake alerts straight to your inbox.',
            'facebook'        => 'https://www.facebook.com/choloabroad',
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
        ]);
    }
}
