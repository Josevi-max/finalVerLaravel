<?php

use Doctrine\DBAL\Types\BigIntType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserValoration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_valorations', function (Blueprint $table) {
            $table->id();
            $table->text("comments")->nullable();
            $table->integer("preliminaryChecks")->nullable();
            $table->integer("installationVehicle")->nullable();
            $table->integer("incorporationCirculation")->nullable();
            $table->integer("normalProgression")->nullable();
            $table->integer("sideShift")->nullable();
            $table->integer("overTaking")->nullable();
            $table->integer("intersections")->nullable();
            $table->integer("changeDirection")->nullable();
            $table->integer("stops")->nullable();
            $table->integer("parking")->nullable();
            $table->integer("obedienceSigns")->nullable();
            $table->integer("lights")->nullable();
            $table->integer("controlsOperation")->nullable();
            $table->integer("otherControls")->nullable();
            $table->integer("safeDriving")->nullable();

            $table->Biginteger('studentId')->unsigned();
            $table->foreign('studentId')->references('id')->on('users')->onDelete('cascade')->onUpdate("cascade");

            $table->Biginteger('teacherId')->unsigned()->unique();
            $table->foreign('teacherId')->references('id')->on('users')->onDelete('cascade')->onUpdate("cascade");



            

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
        Schema::dropIfExists('user_valoration');
    }
}
