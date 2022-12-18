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
        Schema::create('motels', function (Blueprint $table) {
            $table->id();

            $table->string('motel_name');
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->double('price');
            $table->boolean('status');
            $table->string('thumbnail_image_name')->nullable();
            $table->string('thumbnail_image_path')->nullable();
            $table->string('address');
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
        Schema::dropIfExists('motals');
    }
};
