<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPartnersTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('partners', function (Blueprint $table) {
            $table->decimal('group_orders_total',14,2)->nullable()->comment('Групповой оборот-ЛО+заказы партнеров');  // сумма вознаграждения
            $table->decimal('group_orders_total_all_time',14,2)->nullable()->comment('Накопленный струк. объем за все время');  // сумма заказов за месяц
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
