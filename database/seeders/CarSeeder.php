<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('cars')->insert([
            'marque' => Str::random(5),
            'modele' => Str::random(5),
            'annee' => rand(1990, 2023),
            'numeroImmatriculation' =>  Str::random(2),
        ]);
    }
}
