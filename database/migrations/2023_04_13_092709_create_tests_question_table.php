<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_question', function (Blueprint $table) {
            $table->unsignedBigInteger('test_id');

            $table->unsignedBigInteger('question_model_id');

            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');

            $table->foreign('question_model_id')->references('id')->on('question_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests_question');
    }
};
