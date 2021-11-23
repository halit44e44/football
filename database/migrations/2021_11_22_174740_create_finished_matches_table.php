<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinishedMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finished_matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leaguesId');
            $table->integer('houseOwner');
            $table->integer('away');
            $table->string('score');
            $table->timestamps();


            $table->foreign('leaguesId')->references('id')->on('leagues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finished_matches');
    }
}
