<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        CategoriesSeeder::class,
        ColorSeeder::class,
        ProductsSeeder::class,
        CartsSeeder::class,
        OderDetailsSeeder::class,
        FactorySeeder::class,
        SizeSeeder::class,
        FeedbackSeeder::class,
        UsersSeeder::class,
        VochersSeeder::class,
        PurchaseNamesSeeder::class
       ]);
    }
}
