<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en')->nullable();
            $table->string('title_it')->nullable();
            $table->string('title_de')->nullable();
            $table->string('title_fr')->nullable();
            $table->integer('display_order');
            $table->boolean('original')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
