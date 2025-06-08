<?php

namespace Database\Seeders\Main;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Main\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $super = Admin::factory()->create([
            'name' => 'Superadmin',
            'email' => config('base.superadmin_email'),
        ]);

        $super->assignRole('Superadmin');

        $admin = Admin::factory()->create([
            'name' => 'Admin',
            'email' => config('base.admin_email'),
        ]);

        $admin->assignRole('Admin');
    }
}
