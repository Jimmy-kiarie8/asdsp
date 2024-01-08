<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('county_id');
            $table->foreign('county_id')->references('id')->on('counties');
            $table->string('inno_location')->nullable();
            $table->string('inno_longitude')->nullable();
            $table->string('inno_latitude')->nullable();
            $table->string('inno_name')->nullable();
            $table->string('inno_code')->nullable();
            $table->longText('inno_objective')->nullable();
            $table->longText('inno_description')->nullable();
            $table->longText('inno_lesson_challenges')->nullable();
            $table->string('inno_cost')->nullable();
            $table->string('innovation_type')->nullable();
            $table->unsignedBigInteger('node_id')->nullable();
            $table->unsignedBigInteger('value_chain_id')->nullable();


            $table->string('inno_sources')->nullable();
            $table->string('manufacturer_name')->nullable();
            $table->integer('inno_vco_promoted')->nullable();
            $table->integer('inno_vco_implimented')->nullable();
            $table->integer('inno_vca_benefit')->nullable();
            $table->integer('inno_male_vca')->nullable();
            $table->integer('inno_female_vca')->nullable();
            $table->integer('inno_youth_vca')->nullable();
            $table->string('inno_cover_image')->nullable();
            $table->longText('inno_challenges')->nullable();
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
            $table->softDeletes();
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
        Schema::dropIfExists('innovations');
    }
}
