<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('course_code');
            $table->string('course_credit');
            $table->longText('course_syllabus')->nullable();
            $table->integer('semester')->nullable()->unsigned();
            $table->integer('course_type')->unsigned();
            $table->integer('programme_type')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('course_type')->references('id')->on('course_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('programme_type')->references('id')->on('programmes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('semester')->references('id')->on('semesters')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('courses');
    }
}
