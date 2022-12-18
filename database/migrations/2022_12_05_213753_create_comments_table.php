<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');

            $table->bigInteger('motel_id')->unsigned()->nullable(true);
            $table->foreign('motel_id')->references('id')->on('motels');

            $table->bigInteger('edu_center_id')->unsigned()->nullable(true);
            $table->foreign('edu_center_id')->references('id')->on('edu_centers');

            $table->bigInteger('dining_venue_id')->unsigned()->nullable(true);
            $table->foreign('dining_venue_id')->references('id')->on('dining_venues');

            $table->bigInteger('tourist_place_id')->unsigned()->nullable(true);
            $table->foreign('tourist_place_id')->references('id')->on('tourist_places');

            $table->bigInteger('scholarship_id')->unsigned()->nullable(true);
            $table->foreign('scholarship_id')->references('id')->on('scholarships');

            $table->bigInteger('job_id')->unsigned()->nullable(true);
            $table->foreign('job_id')->references('id')->on('jobs');

            $table->bigInteger('parent_id')->unsigned()->nullable();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
