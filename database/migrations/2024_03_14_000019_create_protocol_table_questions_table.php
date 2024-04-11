<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtocolTableQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('protocol_table_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('desc_activity')->nullable();
            $table->string('desc_control')->nullable();
            $table->string('support_info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
