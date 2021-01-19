<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegisteredCourseInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registered_course_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cust_id');
            $table->integer('course_id');
            $table->integer('schedule_id');
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
        Schema::dropIfExists('registered_course_info');
    }
}