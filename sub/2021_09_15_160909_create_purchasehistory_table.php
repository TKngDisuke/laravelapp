<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasehistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasehistorys', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('stock_id');
            $table->integer('user_id');
            $table->dateTime('time');
            $table->string('name');
            $table->integer('price');
            $table->string('image');
            $table->integer('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasehistorys');
    }
}