<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraudAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('fraud_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
