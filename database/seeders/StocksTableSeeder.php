<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 1; $i <= 6; $i++){
        $param = [
            'possible'=>1,
           ];
           DB::table('progate.storestocks')->insert($param);
        }
    }
}