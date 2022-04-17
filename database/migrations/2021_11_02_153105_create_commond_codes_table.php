<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommondCodesTable extends Migration
{
    
    public function up()
    {
        Schema::create('commond_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191)->nullable();
            $table->string('value', 191)->nullable();
            $table->string('link', 191)->nullable();
            $table->string('image', 191)->nullable();
            $table->string('color', 191)->nullable();
            $table->string('ordering', 11)->nullable();
            $table->string('active', 5)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('parent_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commond_codes');
    }
}
