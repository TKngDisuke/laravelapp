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
   }
}

