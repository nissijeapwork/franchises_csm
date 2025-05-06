<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'John Dela Cruz', 
            'email' => 'john@laravel.com',
            'password' => Hash::make('superadmin54321')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Peter Mariano', 
            'email' => 'peter@laravel.com',
            'password' => Hash::make('admin54321')
        ]);
        $admin->assignRole('Admin');
    }
}