<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('publication_title')->nullable();
            $table->string('code')->unique();
            $table->string('cover_image')->nullable();
            $table->text('url_link')->nullable();
            $table->string('author')->nullable();
            $table->string('category')->default('Report');
            $table->string('language')->default('English');
            $table->string('publisher')->nullable();
            $table->string('year_of_publication')->nullable();
            $table->string('resourse_path')->nullable();
            $table->string('rights')->default('Attribution-NonCommercial');
            $table->string('license')->nullable();
            $table->string('publish_date')->nullable();
            $table->longText('publication_desciption')->nullable();
            $table->string('publish_status')->default('Published');
            $table->integer('published_by')->unsigned()->nullable();
            $table->integer('is_deleted')->nullable();
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')
                ->onUpdate('No Action')->onDelete('No Action');
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
        Schema::dropIfExists('publications');
    }
}
