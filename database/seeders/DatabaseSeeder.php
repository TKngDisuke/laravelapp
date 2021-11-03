<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   public function run()
   {
       $this->call(RestdataTableSeeder::class);
       $this->call(ProductTableSeeder::class);
       $this->call(CartTableSeeder::class);
       $this->call(MultiAuthTableSeeder::class);
       $this->call(StocksTableSeeder::class);
       $this->call(Stocks2TableSeeder::class);
   }
}

