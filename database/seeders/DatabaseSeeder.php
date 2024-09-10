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
       // $this->call([ CarSeeder::class]);

       // $this->call(DriverSeeder::class);


        User::factory()->create([
            'name' => 'Admin1',
            'password' => '1234567891',
            'email' => 'admin1@gmail.com',
        ]);
    }
}
