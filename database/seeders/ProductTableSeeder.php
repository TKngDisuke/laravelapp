<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
{
   $param = [
    'name' => 'apple',
    'price' => '200',
    'image' => '',
    'type' => '1',
   ];
   DB::table('progate.products')->insert($param);

   $param = [
    'name' => 'juice',
    'price' => '150',
    'image' => '',
    'type' => '2',
   ];
   DB::table('progate.products')->insert($param);

   $param = [
    'name' => 'coke',
    'price' => '150',
    'image' => '',
    'type' => '2',
   ];
   DB::table('progate.products')->insert($param);
}
}