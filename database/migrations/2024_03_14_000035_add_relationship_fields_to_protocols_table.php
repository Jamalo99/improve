<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProtocolsTable extends Migration
{
    public function up()
    {
        Schema::table('protocols', function (Blueprint $table) {
            $table->unsignedBigInteger('workspace_id')->nullable();
            $table->foreign('workspace_id', 'workspace_fk_9596248')->references('id')->on('workspaces');
            $table->unsignedBigInteger('capital_id')->nullable();
            $table->foreign('capital_id', 'capital_fk_9596262')->references('id')->on('capitals');
            $table->unsignedBigInteger('macroprocess_id')->nullable();
            $table->foreign('macroprocess_id', 'macroprocess_fk_9596263')->references('id')->on('macroprocesses');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_9596268')->references('id')->on('statuses');
        });
    }
}
