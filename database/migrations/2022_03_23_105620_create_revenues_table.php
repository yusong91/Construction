<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenuesTable extends Migration
{
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('commond_codes');
            $table->bigInteger('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('customer_name', 190);
            $table->date('from_date');
            $table->date('to_date');
            $table->string('from_location', 190);
            $table->integer('number_working_day');
            $table->string('rent_price', 190);
            $table->integer('amount');
            $table->text('note');
            $table->string('file', 190);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('revenues');
    }
}
