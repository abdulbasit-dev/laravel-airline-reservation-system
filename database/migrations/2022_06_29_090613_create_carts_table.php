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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('added_by')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('client_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->nullable()->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('coupon_code')->nullable();
            $table->double('discount', 10, 3)->nullable();
            $table->boolean('coupon_applied')->default(0);
            $table->boolean('type')->nullable()->comment('0 for piece, 1 for box');
            $table->integer('quantity')->default(0);
            $table->double('price')->nullable();
            $table->double('purchase_price')->comment("for both box/piese")->nullable();
            $table->integer('free')->nullable()->comment('free samples');
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
        Schema::dropIfExists('carts');
    }
};
