<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMacroprocessesTable extends Migration
{
    public function up()
    {
        Schema::table('macroprocesses', function (Blueprint $table) {
            $table->unsignedBigInteger('capital_id')->nullable();
            $table->foreign('capital_id', 'capital_fk_9595838')->references('id')->on('capitals');
        });
    }
}
