<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colorSeed = [];
       for ($i = 0; $i < 10; $i++){
        $colorSeed[] = [
            "col_name" => fake()->name(),
            "status" => fake()->numberBetween(1,0)
        ];
    }
    DB::table('color')->insert($colorSeed);
    }
}
