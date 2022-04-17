<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Maintenance extends Migration
{
    
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('commond_codes');
            $table->bigInteger('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->bigInteger('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->integer('staff_id')->unsigned();
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->string('service', 190);
            $table->integer('quantity');
            $table->string('unit_price');
            $table->integer('amount');
            $table->text('note');
            $table->string('image_broken', 190);
            $table->string('image_replace', 190);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maintenances');
    }
}
