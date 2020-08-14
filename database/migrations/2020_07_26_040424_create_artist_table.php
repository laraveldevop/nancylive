<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('artist_name')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('firm_address')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->text('about')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('image')->nullable();
            $table->string('image_id')->nullable();
            $table->string('video')->nullable();
            $table->string('rate')->nullable();
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
        Schema::dropIfExists('artist');
    }
}
