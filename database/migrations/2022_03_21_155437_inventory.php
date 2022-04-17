<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inventory extends Migration
{
    
    public function up()
    {
        Schema::create('inventorys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('sparep_id');
            //$table->foreign('sparep_id')->references('id')->on('commond_codes');
            $table->string('menufacture', 190);
            $table->string('vender', 190);
            $table->integer('quantity');
            $table->integer('unit');
            $table->string('price', 190);
            $table->date('purchased_date', 190);
            $table->text('warehouse_location');
            $table->string('image', 190);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('inventorys');
    }
}
