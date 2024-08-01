<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $rol_id =  DB::table('purchase_name')->pluck('id')->toArray();
        $UseSeed = [];
        for ($i = 0; $i < 10; $i++){
         $UseSeed[] = [
             "user_name" => fake()->text(10),
             "rol_id" =>fake()->randomElement($rol_id),
             "password"=>fake()->text(25),
             "phone_number"=>fake()->phoneNumber(11),
             "email"=>fake()->email(255),
             "address"=>fake()->address(255),
             "status" => fake()->numberBetween(1,0)
         ];
        }
        DB::table('users')->insert($UseSeed);
    }
}
