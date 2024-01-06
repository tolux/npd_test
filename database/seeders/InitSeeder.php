<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add name, email, password, role to be admin, and remember_token to the fillable property in the User model

        // Insert a sample admin
        DB::table('admins')->insert([
            'username' => 'admin',
            'email' => 'admin@ad.com',
            'password' => Hash::make('1234admin'),
            'email_verified_at' => now(), // Set the verification timestamp to now
            'remember_token' => Str::random(10),
            'created_at' => now()
        ]);

        // Insert a sample user
        DB::table('users')->insert([
            'email' => 'user1@dev.co',
            'password' => Hash::make('123456'),
            'email_verified_at' => now(), // Set the verification timestamp to now
            'remember_token' => Str::random(10),
            'created_at' => now(),
        ]);
    }
}
