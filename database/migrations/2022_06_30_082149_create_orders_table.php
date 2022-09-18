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
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('has_bonus')->default(false);
            $table->double('total_price', 10, 3);
            $table->double('profit', 10, 3);
            $table->boolean('is_paid')->default(false);
            $table->decimal('lat', 16, 14)->nullable();
            $table->decimal('long', 16, 14)->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('note')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_amount')->nullable();
            $table->date('arrive_at')->comment('the deadline of order to be delivered');

            $table->string('status')->default('ordered')->comment('ordered|canceled|accepted|assigned|pickedup|delivered');
            $table->foreignId('status_by')->nullable()->constrained('users')->nullOnDelete();

            // order progress 
            $table->boolean('is_ordered')->default(true);
            $table->foreignId('order_by')->nullable()->constrained('users')->nullOnDelete();

            $table->boolean('is_accepted')->default(false);
            $table->foreignId('accepted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->date('accepted_at')->nullable();

            $table->boolean('is_canceled')->default(false);
            $table->foreignId('canceled_by')->nullable()->constrained('users')->nullOnDelete();
            $table->date('canceled_at')->nullable();
            //added by sav4n
            $table->text('cancel_note')->nullable();

            $table->boolean('is_assigned')->default(false);
            $table->foreignId('assigned_by')->comment('warehouse manger')->nullable()->constrained('users')->nullOnDelete();
            $table->date('assigned_at')->nullable();

            $table->boolean('is_pickedup')->default(false);
            $table->foreignId('pickedup_by')->nullable()->constrained('users')->nullOnDelete();
            $table->date('pickedup_at')->nullable();

            $table->boolean('is_delivered')->default(false);
            $table->date('delivered_at')->nullable();

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
        Schema::dropIfExists('orders');
    }
};
