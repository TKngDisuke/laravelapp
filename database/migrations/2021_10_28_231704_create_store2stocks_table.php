<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStore2stocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store2stocks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('possible');
            $table->foreign('id') 
            ->references('id')
            ->on('products')
            ->cascadeOnDelete()
            ->cascadeOnUpdate(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store2stocks');
    }
}
