<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factorySeed = [];
       for ($i = 0; $i < 10; $i++){
        $factorySeed[] = [
            "fac_name" => fake()->name(),
            "status" => fake()->numberBetween(1,0)
        ];
    }
    DB::table('factory')->insert($factorySeed);
    }
}
