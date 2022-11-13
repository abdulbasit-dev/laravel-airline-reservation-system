<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("flight_id")->constrained()->cascadeOnDelete();
            $table->string("seat_number");
            $table->tinyInteger("status")->default(0)->comment("0: pendding, 1: accepted, 2: canceled");
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
