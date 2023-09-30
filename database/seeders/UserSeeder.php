<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(200)->create();

        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@siakad.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    }
}
