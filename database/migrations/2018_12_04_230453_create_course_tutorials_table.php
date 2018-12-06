<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_tutorials', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('tutorial_id')->index();
            $table->foreign('tutorial_id')->references('id')->on('tutorials')->onDelete('cascade');
            $table->unsignedInteger('course_id')->index();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('course_tutorials');
        Schema::enableForeignKeyConstraints();
    }
}
