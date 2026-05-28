<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::findByName('Administrador');

        User::updateOrCreate(
            ['username' => 'omarqm'],
            [
                'full_name' => 'Beymar Fabian Rodriguez Machicado',
                'password' => app('hash')->make('Omar411*'),
            ]
        )->syncRoles([$role->name]);
    }
}

