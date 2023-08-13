<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Lidelle",
            'email' => "vanella@gmail.com",
            'email_verified_at' => now(),
            'password' => 'password',
            'image' => null,

        ]);

        User::create([
            'name' => "Donald",
            'email' => "donald@gmail.com",
            'email_verified_at' => now(),
            'password' => 'password',
            'image' => null,
        ]);

        User::create([
            'name' => "vane",
            'email' => "dvl@gmail.com",
            'email_verified_at' => now(),
            'password' => 'password',
            'image' => null,
        ]);
    }
}
