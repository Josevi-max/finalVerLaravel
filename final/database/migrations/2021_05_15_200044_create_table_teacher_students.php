<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTeacherStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_teacher_students', function (Blueprint $table) {
            $table->id();
            $table->Biginteger('studentId')->unsigned()->unique();
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
        Schema::dropIfExists('table_teacher_students');
    }
}
