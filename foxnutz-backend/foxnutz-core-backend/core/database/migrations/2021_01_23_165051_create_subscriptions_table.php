<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->text('sub_name');
            $table->text('product_name');
            $table->text('product_description')->nullable();
            $table->text('media_ids');
            $table->text('varient');
            $table->integer('delivery_cost')->default(0);
            $table->integer('special_offer')->default(0);
            $table->boolean('is_published')->default(1);
            $table->integer('is_verified')->default(0);
            $table->integer('in_stock')->default(1);
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
        Schema::dropIfExists('subscriptions');
    }
}
