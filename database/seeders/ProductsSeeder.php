<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $cat_id = DB::table('categories')->pluck('id')->toArray();
        $col_id = DB::table('color')->pluck('id')->toArray();
        $size_id = DB::table('size')->pluck('id')->toArray();
        $fac_id = DB::table('factory')->pluck('id')->toArray();
        $ProSeed = [];
        for ($i = 0; $i < 10; $i++){
         $ProSeed[] = [
             "pro_name" => fake()->name(),
             "cat_id" =>fake()->randomElement($cat_id),
             "col_id"=>fake()->randomElement($col_id),
             "size_id"=>fake()->randomElement($size_id),
             "fac_id"=>fake()->randomElement($fac_id),
             "images"=>fake()->image(),
             "quantity"=>fake()->randomNumber(),
             "price"=>fake()->randomNumber(),
             "decription"=>fake()->text(255),
             "status" => fake()->numberBetween(1,0)
             ];
       }
    DB::table('products')->insert($ProSeed);
   }
}
