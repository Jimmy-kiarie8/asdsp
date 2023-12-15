<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovationImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovation_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('innovation_id');
            $table->foreign('innovation_id')->references('id')->on('innovations');
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
        Schema::dropIfExists('innovation_images');
    }
}
