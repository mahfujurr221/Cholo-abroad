<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()['cache']->forget('spatie.permission.cache');

        // Create permissions
        $permissions = [
            //role
            'list-role',
            'create-role',
            'edit-role',
            'delete-role',

            //permission
            'list-permission',
            'create-permission',
            'edit-permission',
            'delete-permission',

            //user
            'list-user',
            'create-user',
            'edit-user',
            'delete-user',

            //profile
            'list-profile',
            'edit-profile',
            'delete-profile',

            //setting
            'update-setting',

            //dashboard
            'dashboard',

            // CMS Modules
            'list-hero', 'create-hero', 'edit-hero', 'delete-hero',
            'list-country', 'create-country', 'edit-country', 'delete-country',
            'list-service', 'create-service', 'edit-service', 'delete-service',
            'list-process', 'create-process', 'edit-process', 'delete-process',
            'list-testimonial', 'create-testimonial', 'edit-testimonial', 'delete-testimonial',
            'list-cta', 'create-cta', 'edit-cta', 'delete-cta',
            'list-aboutus', 'create-aboutus', 'edit-aboutus', 'delete-aboutus',
            'list-faq', 'create-faq', 'edit-faq', 'delete-faq',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $role = Role::findByName('Admin');
        $role->givePermissionTo(Permission::all());
    }
}
