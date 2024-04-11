<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtocolsTable extends Migration
{
    public function up()
    {
        Schema::create('protocols', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('index');
            $table->string('control_manager');
            $table->string('control_deputy')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
