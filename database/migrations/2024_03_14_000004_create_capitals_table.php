<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapitalsTable extends Migration
{
    public function up()
    {
        Schema::create('capitals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en')->unique();
            $table->string('name_it')->unique();
            $table->string('name_de')->unique();
            $table->string('name_fr')->unique();
            $table->string('index');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
