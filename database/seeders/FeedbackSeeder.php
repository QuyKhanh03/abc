<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol_id = DB::table('purchase_name')->pluck('id')->toArray();
        $pro_id = DB::table('products')->pluck('id')->toArray();
        $FeedbackSeed = [];
        for ($i = 0; $i < 10; $i++){
         $FeedbackSeed[] = [
             "rol_id" =>fake()->randomElement($rol_id),
             "pro_id"=>fake()->randomElement($pro_id),
             "phone_number"=>fake()->phoneNumber(11),
             "email"=>fake()->email(200),
             "title"=>fake()->text(200),
             "discription"=>fake()->text(200),
             ];
       }
    DB::table('feedback')->insert($FeedbackSeed);
    }
}
