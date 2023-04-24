<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners_operation', function (Blueprint $table) {
            $table->id();
            $table->decimal('reward_total',14,2);
            $table->tinyInteger('type')->comment('1-приход, 2-расход');
            $table->foreignId('partners_id')->constrained()->onDelete('cascade');
            $table->foreignId('reward_operations_id')->constrained();
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
        Schema::dropIfExists('partners_operation');
    }
}
