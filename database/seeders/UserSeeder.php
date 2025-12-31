<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $hrRole = Role::where('name', 'hr')->first();
        $accountantRole = Role::where('name', 'accountant')->first();
        $staffRole = Role::where('name', 'staff')->first();

        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'user_name' => 'System Admin',
                'password' => Hash::make('admin123'),
                'password_configured' => 1,
                'employee_id' => null,
                'role_id' => $adminRole?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'hr@example.com'],
            [
                'user_name' => 'HR Manager',
                'password' => Hash::make('hr123'),
                'password_configured' => 1,
                'employee_id' => null,
                'role_id' => $hrRole?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'accountant@example.com'],
            [
                'user_name' => 'Accountant',
                'password' => Hash::make('accountant123'),
                'password_configured' => 1,
                'employee_id' => null,
                'role_id' => $accountantRole?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@example.com'],
            [
                'user_name' => 'Staff User',
                'password' => Hash::make('staff123'),
                'password_configured' => 1,
                'employee_id' => null,
                'role_id' => $staffRole?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
