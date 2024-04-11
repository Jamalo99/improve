<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadencesTable extends Migration
{
    public function up()
    {
        Schema::create('cadences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en')->unique();
            $table->string('name_it')->unique();
            $table->string('name_de')->unique();
            $table->string('name_fr')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
