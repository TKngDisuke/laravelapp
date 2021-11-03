<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Stocks2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 6; $i <= 16; $i++){
        $param = [
            'id'=>$i,
            'possible'=>1,
           ];
           DB::table('progate.store2stocks')->insert($param);
        }
    }
}