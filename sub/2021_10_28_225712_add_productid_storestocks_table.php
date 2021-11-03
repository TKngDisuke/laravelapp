<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductidStorestocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { Schema::table('storestocks', function (Blueprint $table) {
        $table->unsignedBigInteger('productid');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('storestocks', function (Blueprint $table) {
            $table->dropColumn('productid');
        });
    }
}
