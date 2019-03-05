<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Address');
            $table->string('rentType');
            $table->string('phone');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('cutomerName');
            $table->integer('cutomerId')->nullable();
            $table->integer('productId');
            $table->string('ownerName');
            $table->integer('ownerId')->nullable();
            $table->string('is_seen')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
