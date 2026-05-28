<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::findByName('Usuario');

        $users = [
            [
                'full_name' => 'María Fernández',
                'username' => 'mariaf',
                'password' => 'MarIa123*',
            ],
            [
                'full_name' => 'Juan Pérez',
                'username' => 'juanp',
                'password' => 'JuanP123*',
            ],
            [
                'full_name' => 'Lucía Gómez',
                'username' => 'lucig',
                'password' => 'LuciaG123*',
            ],
            [
                'full_name' => 'Carlos López',
                'username' => 'carlosl',
                'password' => 'CarlosL123*',
            ],
        ];

        foreach ($users as $u) {
            User::updateOrCreate(
                ['username' => $u['username']],
                [
                    'full_name' => $u['full_name'],
                    'password' => $this->hashPassword($u['password']),
                ]
            )->syncRoles([$role->name]);
        }
    }

    private function hashPassword(string $plain): string
    {
        return app('hash')->make($plain);
    }
}

