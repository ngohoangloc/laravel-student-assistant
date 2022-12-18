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
        Schema::create('edu_centers', function (Blueprint $table) {
            $table->id();
            $table->string('center_name');
            $table->string('address');
            $table->string('center_phone');
            $table->string('center_website')->nullable();
            $table->string('thumbnail_image_name')->nullable();
            $table->string('thumbnail_image_path')->nullable();
            $table->text('description');
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
        Schema::dropIfExists('edu_centers');
    }
};
