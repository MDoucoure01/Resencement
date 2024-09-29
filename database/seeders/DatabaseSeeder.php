<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();



        \App\Models\User::create([
            'last_name' => 'Sy',
            'first_name' => 'Babacar',
            'phone' => '771234567',
            'address' => 'adresse',
            'id_card_number' => 'id_card_number',
            'role' => "admin",
            'password' =>Hash::make('password'),
            'email' => 'test@example.com',
        ]);
       // $this->call(UserSeeder::class);
    }
}
