<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraudQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('fraud_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en')->nullable();
            $table->string('title_it')->nullable();
            $table->string('title_de')->nullable();
            $table->string('title_fr')->nullable();
            $table->string('type_answer');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
