<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'gender' => 'Homme',
                'phone' => '123456789',
                'address' => '123 Admin St',
                'id_card_number' => Str::random(10),
                'role' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('Adminpass@2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Supervisor',
                'last_name' => 'User',
                'gender' => 'Femme',
                'phone' => '987654321',
                'address' => '456 Supervisor St',
                'id_card_number' => Str::random(10),
                'role' => 'supervisor',
                'email' => 'supervisor@example.com',
                'password' => Hash::make('Superpass@2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Ghost',
                'last_name' => 'Ghost',
                'gender' => 'Homme',
                'phone' => '780000000',
                'address' => '456 Supervisor St',
                'id_card_number' => 0000000000,
                'role' => 'supervisor',
                'email' => 'ghos@example.com',
                'password' => Hash::make('Ghost@2024'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
