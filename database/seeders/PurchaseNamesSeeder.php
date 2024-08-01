<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $RoleSeed = [];
        for ($i = 0; $i < 10; $i++){
         $RoleSeed[] = [
             "role_name" => fake()->name(),
    
         ];
     }
     DB::table('purchase_name')->insert($RoleSeed);
    }
}
