<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClippablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clippables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->morphs('clippable');	
            $table->timestamps();
        });
        Schema::dropIfExists('clips');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clippables');
    }
}
