<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pro_id = DB::table('products')->pluck('id')->toArray();
        $CartSeed = [];
        for ($i = 0; $i < 10; $i++){
         $CartSeed[] = [
             "pro_id" =>fake()->randomElement($pro_id),
             "images"=>fake()->text(255),
             "quantity"=>fake()->randomNumber(),
             "price"=>fake()->randomNumber(),
             "total_money"=>fake()->randomNumber(),
             ];
       }
    DB::table('cart')->insert($CartSeed);
    }
}
