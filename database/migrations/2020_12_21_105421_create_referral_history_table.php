<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stat');
            $table->enum('status',['paid','unpaid'])->default('unpaid');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('magazine_id');
            $table->string('referral_code');
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
        Schema::dropIfExists('referral_history');
    }
}
