<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnToPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package', function (Blueprint $table) {
            $table->string('time_method')->nullable()->after('content_count');
            $table->bigInteger('count_duration')->nullable()->after('content_count');
            $table->bigInteger('day')->nullable()->after('content_count');
            $table->bigInteger('month')->nullable()->after('content_count');
            $table->bigInteger('year')->nullable()->after('content_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package', function (Blueprint $table) {
            $table->dropColumn(['time_method','count_duration', 'day', 'month', 'year']);
        });
    }
}
