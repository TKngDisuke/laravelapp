<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ('name')=> 'マック南大沢店',
            ('adress')=> '東京都八王子市南大沢２－２９',
            ('time')=> '6:00〜22:00',
            ('phone')=> '0426779155',
            ('MOtime')=> '6:00〜22:00',
            ('audience_seat')=> '200',
            ('parking')=> '0',
            ('others')=> 'お待ちしております',
           ];
           DB::table('progate.store')->insert($param);
        
           $param = [
            ('name')=> 'くら寿司南大沢店',
            ('adress')=> '東京都八王子市南大沢4－２９',
            ('time')=> '6:00〜22:00',
            ('phone')=> '0426779113',
            ('MOtime')=> '6:00〜22:00',
            ('audience_seat')=> '200',
            ('parking')=> '0',
            ('others')=> 'お待ちしております',
           ];
           DB::table('progate.store')->insert($param);
        
           $param = [
            ('name')=> 'ミスド南大沢店',
            ('adress')=> '東京都八王子市南大沢3－２９',
            ('time')=> '6:00〜22:00',
            ('phone')=> '0426779150',
            ('MOtime')=> '6:00〜22:00',
            ('audience_seat')=> '200',
            ('parking')=> '200',
            ('others')=> 'お待ちしております',
           ];
           DB::table('progate.store')->insert($param);
    }
}


