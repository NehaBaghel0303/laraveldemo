<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('speciality');
            $table->string('cuisine');
            $table->string('gng');
            $table->string('status')->nullable();
            $table->text('varient');
            $table->integer('mrp');
            $table->integer('special_offer')->default(0);
            $table->boolean('is_published')->default(1);
            $table->text('media_ids');
            $table->integer('delivery_cost')->default(0);
            $table->text('description');
            $table->string('preference');
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
        Schema::dropIfExists('products');
    }
}
