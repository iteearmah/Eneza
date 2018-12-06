<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choices', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('question_id')->index()->nullable();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->string('content');
            $table->enum('correct', ['true', 'false'])->default('false');
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
        Schema::dropIfExists('choices');
        Schema::enableForeignKeyConstraints();
    }
}
