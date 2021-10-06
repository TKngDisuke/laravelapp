<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchasehistorys', function (Blueprint $table) {
            $table->integer('purchase_id');
            $table->integer('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasehistorys', function (Blueprint $table) {
            $table->dropColumn('purchase_id');
            $table->dropColumn('password');
        });
    }
}
