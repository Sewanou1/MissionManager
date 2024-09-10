<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->insert([
            [
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'numPermis' => Str::random(10),
                'dateNaissance' => '1985-05-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Martin',
                'prenom' => 'Marie',
                'numPermis' => Str::random(10),
                'dateNaissance' => '1990-11-23',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Durand',
                'prenom' => 'Pierre',
                'numPermis' => Str::random(10),
                'dateNaissance' => '1978-03-30',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
