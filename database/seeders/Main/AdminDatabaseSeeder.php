<?php

namespace Database\Seeders\Main;

use App\Models\Main\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $super = Admin::where('email', config('base.superadmin_email'))->first();

        if (! $super) {
            $super = Admin::factory()->create([
                'email' => config('base.superadmin_email'),
                'username' => config('base.superadmin_username'),
                'name' => 'Superadmin',
                'is_active' => true,
            ]);
        }

        $super->assignRole('Superadmin');

        // $admin = Admin::where('email', config('base.admin_email'))->first();

        // if (! $admin) {
        //     $admin = Admin::factory()->create([
        //         'email' => config('base.admin_email'),
        //         'name' => 'Admin',
        //         'is_active' => true,
        //     ]);
        // }

        // $admin->assignRole('Admin');
    }
}
