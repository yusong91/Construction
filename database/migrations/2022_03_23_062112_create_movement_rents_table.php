<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * ['type_id', 'equipment_id', 'customer_id', 'customer_name', 'customer_phone', 'date', 'from_location', 'to_location', 'expected_date'];
     */
    public function up()
    {
        Schema::create('movement_rents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('commond_codes');
            $table->bigInteger('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('customer_name', 190);
            $table->string('customer_phone', 190);
            $table->date('date', 6);
            $table->string('from_location', 190);
            $table->string('to_location', 190);
            $table->integer('expected_date');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('movement_rents');
    }
}
