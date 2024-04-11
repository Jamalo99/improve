<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRisksTable extends Migration
{
    public function up()
    {
        Schema::table('risks', function (Blueprint $table) {
            $table->unsignedBigInteger('control_key_id')->nullable();
            $table->foreign('control_key_id', 'control_key_fk_9596143')->references('id')->on('control_keys');
            $table->unsignedBigInteger('probability_id')->nullable();
            $table->foreign('probability_id', 'probability_fk_9596144')->references('id')->on('probabilities');
            $table->unsignedBigInteger('impact_id')->nullable();
            $table->foreign('impact_id', 'impact_fk_9596145')->references('id')->on('impacts');
        });
    }
}
