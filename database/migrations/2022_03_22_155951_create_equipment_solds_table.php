<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentSoldsTable extends Migration
{
   
    public function up()
    {
        Schema::create('equipment_solds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->string('sale_description', 190);
            $table->date('sale_date', 6);
            $table->string('sale_price', 20);
            $table->string('sale_to', 100);
            $table->text('note');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipment_solds');
    }
}
