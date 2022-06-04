<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnclaimsTable extends Migration
{
    
    public function up()
    {
        Schema::create('unclaims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('maintenance_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            $table->date('invoice_date');
            $table->string('invoice_number', 100);
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('maintenance_id')->references('id')->on('maintenances');
            $table->text('memo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unclaims');
    }
}
