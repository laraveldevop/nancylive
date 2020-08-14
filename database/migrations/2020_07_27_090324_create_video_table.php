<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cat_id');
            $table->bigInteger('artist_id')->nullable();
            $table->string('video_name')->nullable();
            $table->text('video')->nullable();
            $table->text('url')->nullable();
            $table->text('detail')->nullable();
            $table->text('image')->nullable();
            $table->string('price')->nullable();
            $table->string('token')->default('0');
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
        Schema::dropIfExists('video');
    }
}
