<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSumToPurchasehistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchasehistories', function (Blueprint $table) {
            $table->integer('sum');
            $table->boolean('receive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasehistories', function (Blueprint $table) {
            $table->dropColumn('sum');
            $table->dropColumn('receive');
        });
    }
}
