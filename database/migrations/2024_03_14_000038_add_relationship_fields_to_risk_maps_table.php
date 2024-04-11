<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRiskMapsTable extends Migration
{
    public function up()
    {
        Schema::table('risk_maps', function (Blueprint $table) {
            $table->unsignedBigInteger('workspace_id')->nullable();
            $table->foreign('workspace_id', 'workspace_fk_9596460')->references('id')->on('workspaces');
            $table->unsignedBigInteger('capital_id')->nullable();
            $table->foreign('capital_id', 'capital_fk_9596461')->references('id')->on('capitals');
            $table->unsignedBigInteger('macroprocess_id')->nullable();
            $table->foreign('macroprocess_id', 'macroprocess_fk_9596462')->references('id')->on('macroprocesses');
            $table->unsignedBigInteger('probability_id')->nullable();
            $table->foreign('probability_id', 'probability_fk_9596463')->references('id')->on('probabilities');
            $table->unsignedBigInteger('impact_id')->nullable();
            $table->foreign('impact_id', 'impact_fk_9596464')->references('id')->on('impacts');
        });
    }
}
