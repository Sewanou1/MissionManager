<?php

namespace Database\Seeders;

use App\Models\Car;
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
        $this->call([
            CarSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'password' => '123456789',
            'email' => 'admin@gmail.com',
        ]);
    }
}
