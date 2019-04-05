<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionQuestionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_question_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('section_question_id');
            $table->string('type');
            $table->string('value');
            $table->text('text')->nullable();
            $table->text('placeholder')->nullable();
            $table->string('width')->nullable();
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
        Schema::dropIfExists('section_question_options');
    }
}
