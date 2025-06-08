<?php

namespace Database\Seeders\Base;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Base\Role;
use Illuminate\Database\Seeder;

class RoleDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $i = 0;
        foreach (config('base.roles') as $guard => $roles) {
            $j = 0;
            foreach ($roles as $name) {
                Role::firstOrCreate([
                    'name' => $name,
                ], [
                    'guard_name' => explode(':', $guard)[1],
                    'display_order' => $i + $j / 10,
                ]);
                $j++;
            }
            $i++;
        }

        foreach (config('base.role_permissions') as $guard => $data) {
            foreach ($data as $role => $permissions) {
                $roleSelected = Role::findByName($role, explode(':', $guard)[1]);
                $permissionUsed = $roleSelected->getPermissionNames()->toArray();
                $permissionToSeeds = [];

                foreach ($permissions as $value) {
                    if (! in_array($value, $permissionUsed)) {
                        $permissionToSeeds[] = $value;
                    }
                }

                $roleSelected->givePermissionTo($permissionToSeeds);
            }
        }
    }
}
