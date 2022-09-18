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
        Schema::create('safe_transactions', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->foreignId('safe_id')->nullable()->constrained('safes')->nullOnDelete();
            $table->text("type")->comment("Deposit or Withdraw");
            $table->foreignId('transaction_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('action_by')->nullable()->constrained('users')->nullOnDelete();
            $table->double('amount')->comment('transaction_amount');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('safe_transactions');
    }
};
