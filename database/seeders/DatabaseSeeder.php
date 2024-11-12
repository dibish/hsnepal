<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Pramita Gahatraj',
            'email' => 'pramitagrgotame75@gmail.com',
            'phone' => '9814256354',
            'nationality' => 'Nepali',
            'address' => 'Byas 2, Damauli',
            'gender' => 'Female',
            'user_type' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::factory()->create([
            'name' => 'Amisha Sundas',
            'email' => 'amisa@gmail.com',
            'phone' => '9814256353',
            'nationality' => 'Nepali',
            'address' => 'Patan, Damauli',
            'gender' => 'Female',
            'user_type' => 'homestay_owner',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::factory()->create([
            'name' => 'Sanjita Shrestha',
            'email' => 'sanjitashrestha322@gmail.com',
            'phone' => '9814256358',
            'nationality' => 'Nepali',
            'address' => 'Byas 2, Damauli',
            'gender' => 'Female',
            'user_type' => 'user',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
