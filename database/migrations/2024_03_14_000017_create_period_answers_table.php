<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('period_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('period');
            $table->string('answer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
