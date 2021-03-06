<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DateClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_class', function (Blueprint $table) {
            $table->id();
            $table->dateTime("dayClass")->unique();
            $table->Biginteger('studentId')->unsigned();
            $table->foreign('studentId')->references('id')->on('users')->onDelete('cascade')->onUpdate("cascade");
            
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
        //
    }
}
