<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlKeyRiskMapPivotTable extends Migration
{
    public function up()
    {
        Schema::create('control_key_risk_map', function (Blueprint $table) {
            $table->unsignedBigInteger('risk_map_id');
            $table->foreign('risk_map_id', 'risk_map_id_fk_9596467')->references('id')->on('risk_maps')->onDelete('cascade');
            $table->unsignedBigInteger('control_key_id');
            $table->foreign('control_key_id', 'control_key_id_fk_9596467')->references('id')->on('control_keys')->onDelete('cascade');
        });
    }
}
