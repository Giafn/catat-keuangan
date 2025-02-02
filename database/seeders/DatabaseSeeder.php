<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Gia Fauzan',
            'email' => 'giafauzan11@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Naja Qisti',
            'email' => 'najaqisthi27@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
