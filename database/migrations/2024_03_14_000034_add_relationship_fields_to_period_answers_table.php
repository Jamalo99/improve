<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPeriodAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('period_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id')->nullable();
            $table->foreign('question_id', 'question_fk_9596233')->references('id')->on('questions');
            $table->unsignedBigInteger('probability_id')->nullable();
            $table->foreign('probability_id', 'probability_fk_9596245')->references('id')->on('probabilities');
            $table->unsignedBigInteger('impact_id')->nullable();
            $table->foreign('impact_id', 'impact_fk_9596246')->references('id')->on('impacts');
        });
    }
}
