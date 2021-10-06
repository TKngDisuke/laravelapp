<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ('user_id')=> '1',
            ('stock_id')=> '1',
           ];
           DB::table('progate.carts')->insert($param);
           $param = [
            ('user_id')=> '2',
            ('stock_id')=> '2',
           ];
           DB::table('progate.carts')->insert($param);
           $param = [
            ('user_id')=> '3',
            ('stock_id')=> '4',
           ];
           DB::table('progate.carts')->insert($param);
    }
}
