<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPartnersOperationTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('partner_operations', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->comment('Уникальный ID заказа из мегагрупп'); 
            $table->decimal('order_total',14,2)->comment('Сумма заказа из мегагрупп');
            $table->foreignId('partners_id');
            $table->foreignId('shops_id');
            $table->text('order_comment')->nullable();
            
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
