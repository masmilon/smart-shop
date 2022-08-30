<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("created_by")->constrained("users");
            $table->double("total_amount");
            $table->double("discount_amount")->default(0);
            $table->integer("status")->comment("Shipment/Payment Status")->default(0);
            $table->string("invoice_number")->nullable();
            $table->text("shipment_address")->nullable();
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
        Schema::dropIfExists('orders');
    }
};