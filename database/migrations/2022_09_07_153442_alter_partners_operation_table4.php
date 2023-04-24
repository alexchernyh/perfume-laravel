<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPartnersOperationTable4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     /*TODO*/
       /* Schema::table('partner_operations', function (Blueprint $table) {
            // $table->foreignId('sub_partner_id')->constrained('partners');

            $table->unsignedBigInteger('sub_partner_id');
            $table->foreign('sub_partner_id')->references('id')->on('partners');

            // $table->foreignId('shop_id')->constrained()->nullable();

            $table->unsignedBigInteger('shop_id');
 
            $table->foreign('shop_id')->references('id')->on('shops')->default('1');
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
