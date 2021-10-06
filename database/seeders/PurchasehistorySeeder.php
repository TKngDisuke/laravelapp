<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PurchasehistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'stock_id' => '35',
            'user_id' => '1',
            'time' => '2016/12/05 21:21:30',
            'name' => 'juice',
            'price' => '150',
            'image' => '',
            'type' => '2',
           ];
           DB::table('progate.purchasehistorys')->insert($param);
        
           $param = [
            'stock_id' => '35',
            'user_id' => '1',
            'time' => '2016/12/05 21:21:30',
            'name' => 'juice',
            'price' => '150',
            'image' => '',
            'type' => '2',
           ];
           DB::table('progate.purchasehistorys')->insert($param);
    }
}
