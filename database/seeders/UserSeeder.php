<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = Role::query()
            ->whereIn('name', [
                User::ROLE_ADMIN,
                User::ROLE_TUTOR,
                User::ROLE_STUDENT,
            ])
            ->get()
            ->keyBy('name');

        $users = [
            [
                'role' => User::ROLE_ADMIN,
                'name' => 'Admin Bimbel',
                'email' => 'admin@bimbel.test',
                'phone' => '081111111111',
            ],
            [
                'role' => User::ROLE_TUTOR,
                'name' => 'Tutor Bimbel',
                'email' => 'tutor@bimbel.test',
                'phone' => '082222222222',
            ],
            [
                'role' => User::ROLE_STUDENT,
                'name' => 'Student Bimbel',
                'email' => 'student@bimbel.test',
                'phone' => '083333333333',
            ],
        ];

        foreach ($users as $account) {
            $role = $roles->get($account['role']);

            if (! $role) {
                continue;
            }

            User::query()->updateOrCreate(
                ['email' => $account['email']],
                [
                    'role_id' => $role->id,
                    'name' => $account['name'],
                    'phone' => $account['phone'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'is_active' => true,
                ]
            );
        }
    }
}
