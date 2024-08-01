<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizeSeed = [];
        for ($i = 0; $i < 10; $i++){
         $sizeSeed[] = [
             "size_name" => fake()->name(),
             "status" => fake()->numberBetween(1,0)
         ];
     }
     DB::table('size')->insert($sizeSeed);
    }
}
