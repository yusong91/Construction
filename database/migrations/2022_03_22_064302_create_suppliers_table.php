<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->bigInteger('sparep_id',)->unsigned;
            // $table->foreign('sparep_id')->references('id')->on('commond_codes');
            $table->string('company_name', 190);
            $table->string('supplier_name', 190);
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->string('job', 190);
            $table->string('address', 200);
            $table->text('other');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
