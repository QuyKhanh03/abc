<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cart_id = DB::table('cart')->pluck('id')->toArray();
        $rol_id =  DB::table('purchase_name')->pluck('id')->toArray();
        $voc_id = DB::table('vocher')->pluck('id')->toArray();
        $oderDetailSeed = [];
        for ($i = 0; $i < 10; $i++){
         $oderDetailSeed[] = [
             "cart_id" =>fake()->randomElement($cart_id),
             "rol_id" =>fake()->randomElement($rol_id),
             "voc_id"=>fake()->randomElement($voc_id),
             "phone_number"=>fake()->phoneNumber(20),
             "email"=>fake()->email(100),
             "address"=>fake()->address(100),
             "decription"=>fake()->text(255),
             "status" => fake()->numberBetween(1,0)
             ];
       }
    DB::table('oder_detail')->insert($oderDetailSeed);
    }
}
