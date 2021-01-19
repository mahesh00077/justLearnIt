<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('cust_id');
            $table->string('name', 200);
            $table->string('email', 200);
            $table->string('mobile_no', 200);
            $table->string('state', 200);
            $table->string('city', 100);
            $table->string('status', 2)->default('0')->comment('0:inactive 1:active');
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
        Schema::dropIfExists('customers');
    }
}