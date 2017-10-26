<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighlightedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('highlighted', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pokemon_id')->unique();
            $table->integer('height');
            $table->integer('weight');
            $table->integer('experience');
            $table->string('sprite');
            $table->timestamps();
            
            $table->foreign('pokemon_id')->references('id')->on('pokemons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('highlighted');
    }
}
