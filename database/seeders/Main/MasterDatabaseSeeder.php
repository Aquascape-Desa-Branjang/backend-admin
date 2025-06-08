<?php

namespace Database\Seeders\Main;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Main\Admin;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class MasterDatabaseSeeder extends Seeder
{
    public Admin $superadmin;

    public function run(): void
    {
        Model::unguard();

        $this->superadmin = Admin::firstWhere('email', config('base.superadmin_email'));

        Filament::auth()->login($this->superadmin);
        Auth::loginUsingId($this->superadmin->id);

        $this->runMasterData();

        Model::reguard();
    }

    public function runMasterData(): void
    {
        // pass
    }
}
