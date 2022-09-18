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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignId('added_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            // $table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();
            $table->bigInteger('barcode');
            $table->double('weight', 5, 2)->nullable();
            $table->string('weight_unit')->comment('kg, gr')->nullable();

            // box
            $table->boolean('is_box')->comment('the product sell by box or not')->default(false);
            $table->integer('pcs_per_box')->nullable()->comment('how many piece per box');
            $table->double('box_price', 9, 3)->nullable()->comment('is the sell_price');
            $table->integer('box_quantity')->nullable();
            $table->double('purchase_box_price')->nullable();
            $table->double('box_min_sell_price')->nullable();
            $table->integer('box_low_stock_quantity')->nullable();

            //piece
            $table->double('price', 9, 3)->comment('is the sell_price');
            $table->integer('quantity')->comment('box_quantity * pcs_per_box ');
            $table->double('purchase_price')->nullable();
            $table->double('min_sell_price')->nullable();
            $table->integer('low_stock_quantity')->nullable();

            $table->integer('num_of_sales')->default(0);
            $table->date('expire_at');
            $table->timestamps();
            $table->softDeletes();
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
};
