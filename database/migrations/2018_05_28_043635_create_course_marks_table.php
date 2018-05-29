<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mark');
            $table->string('class_test')->nullable();
            $table->string('attendence')->nullable();
            $table->string('internal_mark')->nullable();
            $table->string('external_mark')->nullable();
            $table->string('third_examiner_mark')->nullable();
            $table->string('lab_performance')->nullable();
            $table->string('lab_attendence')->nullable();
            $table->string('lab_final')->nullable();
            $table->string('lab_quiz')->nullable();
            $table->string('lab_viva')->nullable();
            $table->integer('student_exam_course')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();
        });

        Schema::table('course_marks', function (Blueprint $table) {
            $table->foreign('student_exam_course')->references('id')->on('student_exam_courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_marks');
    }
}
