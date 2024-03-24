<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin',
            'password' => 'admin',
            'is_admin' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'image_url' => ''
        ]);

        User::create([
            'username' => 'lm23-2',
            'email' => 'lm23-2',
            'password' => 'lm23-2',
            'is_admin' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'image_url' => 'public/images/lm232.jpg'
        ]);
        // User::factory(10)->create();
    }
}
