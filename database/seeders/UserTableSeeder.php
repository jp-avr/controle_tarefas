<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'dev',
            'lastname' => 'Dev',
            'email' => 'dev@dev.com',
            'password' => Hash::make(123),
            'email_verified_at' => now()
        ]);

        User::create([
            'name' => 'João Pedro',
            'lastname' => 'Dev',
            'email' => 'jp.avrdev@gmail.com',
            'password' => Hash::make(123),
            'email_verified_at' => now()
        ]);
    }
}
