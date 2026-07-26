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

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creating super admin user
        $superAdmin = User::create([
            'fname' => 'Super',
            'lname' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '00000000000',
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
        Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        Role::create(['name' => 'Vendor', 'guard_name' => 'web']);
        Role::create(['name' => 'Customer', 'guard_name' => 'web']);
        Role::create(['name' => 'Delivery Boy', 'guard_name' => 'web']);
        Role::create(['name' => 'Operator', 'guard_name' => 'web']);

        // Creating settings
        Setting::create([
            'site_name' => 'Cholo Abroad',
            'site_title' => 'Cholo Abroad',
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'email' => 'choloabroad@gmail.com',
            'phone' => '00000000000',
            'address' => 'Italy',
            'footer_text' => '© 2025 Cholo Abroad. All rights reserved.',
            'newslatter_text' => 'Subscribe to our newsletter',
            'facebook' => 'https://www.facebook.com/',
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
