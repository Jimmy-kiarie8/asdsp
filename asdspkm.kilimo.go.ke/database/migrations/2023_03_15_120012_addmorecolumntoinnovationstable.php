<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addmorecolumntoinnovationstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('innovations', function (Blueprint $table) {
            //
            $table->string('vco_name')->nullable();
            $table->string('inno_subcounty')->nullable();
            $table->string('inno_ward')->nullable();
            $table->string('innovation_status',80)->nullable();
            $table->string('inno_male_adultvca')->nullable();
            $table->string('inno_female_adultvca')->nullable();
            $table->string('inno_youth_malevca')->nullable();
            $table->string('inno_youth_femalevca')->nullable();
            $table->string('innovation_output')->nullable();
            $table->string('inno_contactname')->nullable();
            $table->string('inno_contacttel')->nullable();
            $table->integer('is_featured')->nullable();
            $table->text('approval_remarks')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('innovations', function (Blueprint $table) {
            //
        });
    }
}
