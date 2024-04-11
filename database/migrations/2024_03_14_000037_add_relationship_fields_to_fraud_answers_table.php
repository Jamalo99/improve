<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFraudAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('fraud_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id')->nullable();
            $table->foreign('question_id', 'question_fk_9596362')->references('id')->on('questions');
            $table->unsignedBigInteger('protocol_id')->nullable();
            $table->foreign('protocol_id', 'protocol_fk_9596363')->references('id')->on('protocols');
            $table->unsignedBigInteger('fraud_question_id')->nullable();
            $table->foreign('fraud_question_id', 'fraud_question_fk_9596373')->references('id')->on('fraud_questions');
        });
    }
}
