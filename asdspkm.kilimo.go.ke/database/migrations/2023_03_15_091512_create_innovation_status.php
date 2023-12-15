<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovationStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovation_status', function (Blueprint $table) {
            $table->id();
            $table->string('status_name',80)->unique();
            $table->timestamps();
        });
         $list=array("Initiated procurement","Finalized procurement","Delivered to beneficiaries");
         foreach($list as $key)
         {
            DB::table('innovation_status')->insert([
            'status_name' =>trim($key),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
           ]);

         }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('innovation_status');
    }
}
