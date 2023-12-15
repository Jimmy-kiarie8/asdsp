<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SuccessStoryImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucess_story_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('story_id');
            $table->foreign('story_id')->references('id')->on('success_stories');
             $table->unsignedBigInteger('image_id');
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
        Schema::dropIfExists('sucess_story_images');
    }
}
