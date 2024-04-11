<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlKeysTable extends Migration
{
    public function up()
    {
        Schema::create('control_keys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('index');
            $table->string('control_manager');
            $table->string('control_deputy')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
