<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VochersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vocherSeed = [];
        for ($i = 0; $i < 10; $i++){
         $vocherSeed[] = [
             "voc_name" => fake()->name(),
             "total_number"=> fake()->randomNumber(),
             "date-create"=>fake()->dateTime()->format('Y-m-d H:i:s'),
             "date-exp"=>fake()->dateTime()->format('Y-m-d H:i:s')
         ];
     }
     DB::table('vocher')->insert($vocherSeed);
    }
}
