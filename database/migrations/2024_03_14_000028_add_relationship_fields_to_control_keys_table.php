<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToControlKeysTable extends Migration
{
    public function up()
    {
        Schema::table('control_keys', function (Blueprint $table) {
            $table->unsignedBigInteger('workspace_id')->nullable();
            $table->foreign('workspace_id', 'workspace_fk_9596252')->references('id')->on('workspaces');
            $table->unsignedBigInteger('capital_id')->nullable();
            $table->foreign('capital_id', 'capital_fk_9595881')->references('id')->on('capitals');
            $table->unsignedBigInteger('macroprocess_id')->nullable();
            $table->foreign('macroprocess_id', 'macroprocess_fk_9595882')->references('id')->on('macroprocesses');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_9595887')->references('id')->on('statuses');
            $table->unsignedBigInteger('cadence_id')->nullable();
            $table->foreign('cadence_id', 'cadence_fk_9595888')->references('id')->on('cadences');
        });
    }
}
