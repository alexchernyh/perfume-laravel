<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('mid_name')->nullable();;
            $table->string('last_name')->index();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->decimal('reward_total',14,4)->nullable();  // сумма вознаграждения
            $table->decimal('orders_total',14,4)->nullable();  // сумма заказов за месяц
            $table->unsignedBigInteger('invited_id')->nullable();
            $table->unsignedBigInteger('partner_id_ecom')->nullable(); // id пользователя в ИМ где сделал заказ
            $table->timestamps();
            $table->foreignId('partners_category_id')->constrained();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
