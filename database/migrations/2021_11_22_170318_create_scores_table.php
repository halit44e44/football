<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teamsId');
            $table->unsignedBigInteger('leaguesId');
            $table->string('point');
            $table->string('winPoint');
            $table->string('losePoint');
            $table->string('draw');
            $table->string('totalGoals');
            $table->timestamps();



            $table->foreign('teamsId')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('leaguesId')->references('id')->on('leagues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
