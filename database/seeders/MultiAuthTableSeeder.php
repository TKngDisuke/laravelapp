<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrator;
use Illuminate\Support\Facades\DB;

class MultiAuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $param = [
            'name' => '明石家さんま',
            'email' => 'sanma@example.com',
            'password' => 'secret',
        ];
        DB::table('progate.administrators')->insert($param);
    }
}
