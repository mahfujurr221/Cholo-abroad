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
