<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->string('quantity');
            $table->string('unit_price');
            $table->string('shipping');
            $table->string('total');
            $table->string('per_unit');
            $table->string('paid');
            $table->string('payment_method');
            $table->string('supplier');
            $table->date('date_paid');
            $table->date('ship_date');
            $table->string('status');
            $table->string('carrier');
            $table->string('tracking_number');
            $table->string('arrived_final');
            $table->boolean('docs');
            $table->string('current_stock');
            $table->string('current_price');
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
        Schema::dropIfExists('shipments');
    }
}
