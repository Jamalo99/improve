<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSectionsTable extends Migration
{
    public function up()
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->unsignedBigInteger('control_key_id')->nullable();
            $table->foreign('control_key_id', 'control_key_fk_9596131')->references('id')->on('control_keys');
        });
    }
}
