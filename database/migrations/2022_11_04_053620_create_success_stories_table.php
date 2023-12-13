<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuccessStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('success_stories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('county_id');
            $table->foreign('county_id')->references('id')->on('counties');
            $table->unsignedBigInteger('node_id')->nullable();
            $table->unsignedBigInteger('value_chain_id')->nullable();
            $table->date('story_date')->nullable();
            $table->string('story_title')->nullable();
            $table->string('strory_description')->nullable();
            $table->string('story_cover_image')->nullable();
            $table->string('story_location')->nullable();
            $table->string('story_longitude')->nullable();
            $table->string('story_latitude')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->string('publish_status')->default('Pending');
            $table->datetime('publish_date')->nullable();
            $table->string('published_by')->nullable();
            $table->string('submit_status')->default("Draft");
            $table->datetime('submit_date')->nullable();
            $table->string('submit_by')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')
                ->onUpdate('No Action')->onDelete('No Action');
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
        Schema::dropIfExists('success_stories');
    }
}
