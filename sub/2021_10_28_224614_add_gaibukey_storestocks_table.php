<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGaibukeyStorestocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('storestocks', function (Blueprint $table) {
            $table->foreign('productid')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('storestocks', function (Blueprint $table) {
            $table->dropForeign('storestocks_productid_foreign');
        });
    }
}
