<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('activity');
            $table->string('description_activity')->nullable();
            $table->string('description_control')->nullable();
            $table->string('ctr')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
