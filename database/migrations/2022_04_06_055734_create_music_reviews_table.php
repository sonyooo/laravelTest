<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('message');
            $table->string('user_name');

            $table->unsignedBigInteger('instrument_id')->unsigned();
            $table->foreign('instrument_id')->references('id')->on('music_instruments')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music_reviews');
    }
}
