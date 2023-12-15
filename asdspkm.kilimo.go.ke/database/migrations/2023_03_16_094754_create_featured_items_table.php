<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_type')->nullable()->comment('Innovation,Success Story,Publication');
            $table->string('item_title')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('publish_date')->nullable();
            $table->text('item_detailurl')->nullable();
            $table->string('display_status')->default('Active');
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
        Schema::dropIfExists('featured_items');
    }
}
