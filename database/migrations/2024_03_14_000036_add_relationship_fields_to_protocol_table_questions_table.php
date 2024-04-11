<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProtocolTableQuestionsTable extends Migration
{
    public function up()
    {
        Schema::table('protocol_table_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('protocol_id')->nullable();
            $table->foreign('protocol_id', 'protocol_fk_9596296')->references('id')->on('protocols');
            $table->unsignedBigInteger('probability_id')->nullable();
            $table->foreign('probability_id', 'probability_fk_9596300')->references('id')->on('probabilities');
            $table->unsignedBigInteger('impact_id')->nullable();
            $table->foreign('impact_id', 'impact_fk_9596301')->references('id')->on('impacts');
        });
    }
}
