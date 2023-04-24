<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained();
            $table->decimal('total', 14, 2);
            $table->decimal('reward', 14, 2);
            $table->text('order_comment')->nullable();
            $table->unsignedBigInteger('order_id')->comment('Уникальный ID заказа из мегагрупп'); 
            $table->unsignedBigInteger('sub_partner_id');
            $table->foreign('sub_partner_id')->references('id')->on('partners');
            $table->foreignId('shops_id')->constrained();
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
