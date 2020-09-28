<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Order_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('total')->nullable();
            $table->string('transaction_id')->nullable();
            $table->enum('status',['pending','shipping','complete'])->default('pending');
            $table->integer('video_id')->nullable();
            $table->integer('single_video_id')->nullable();
            $table->integer('video_count')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('stat')->nullable();
            $table->string('payment')->nullable();
            $table->string('expire_date')->nullable();
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
        Schema::dropIfExists('history');
    }
}
