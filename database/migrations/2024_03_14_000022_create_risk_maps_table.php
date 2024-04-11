<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskMapsTable extends Migration
{
    public function up()
    {
        Schema::create('risk_maps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('risk_owner')->nullable();
            $table->string('desc_risk')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
