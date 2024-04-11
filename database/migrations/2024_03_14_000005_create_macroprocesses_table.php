<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMacroprocessesTable extends Migration
{
    public function up()
    {
        Schema::create('macroprocesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en');
            $table->string('name_it');
            $table->string('name_de');
            $table->string('name_fr');
            $table->string('index');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
