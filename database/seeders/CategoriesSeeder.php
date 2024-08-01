<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catSeed = [];
       for ($i = 0; $i < 10; $i++){
        $catSeed[] = [
            "cat_name" => fake()->name(),
            "status" => fake()->numberBetween(1,0)
        ];
    }
    DB::table('categories')->insert($catSeed);
    }
}