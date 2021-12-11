<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('subscription_id')->unsigned();
            $table->string('sub_type');
            $table->integer('duration_in_days');
            $table->integer('quantity');
            $table->integer('quantity_type_id')->unsigned();            
            $table->integer('total_price');            
            $table->string('status')->nullable();            
            $table->integer('payment_gateway');            
            $table->integer('coupoun_id')->nullable();            
            $table->integer('paid_amount');            
            $table->integer('delivery_cost')->default(0);            
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
        Schema::dropIfExists('subscribers');
    }
}
