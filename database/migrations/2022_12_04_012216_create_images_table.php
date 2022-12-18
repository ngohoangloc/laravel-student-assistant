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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('image_name')->nullable(true);
            $table->string('image_path')->nullable(true);

            $table->bigInteger('motel_id')->unsigned()->nullable(true);
            $table->foreign('motel_id')->references('id')->on('motels');

            $table->bigInteger('edu_center_id')->unsigned()->nullable(true);
            $table->foreign('edu_center_id')->references('id')->on('edu_centers');

            $table->bigInteger('dining_venue_id')->unsigned()->nullable(true);
            $table->foreign('dining_venue_id')->references('id')->on('dining_venues');

            $table->bigInteger('tourist_place_id')->unsigned()->nullable(true);
            $table->foreign('tourist_place_id')->references('id')->on('tourist_places');

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
        Schema::dropIfExists('images');
    }
};
