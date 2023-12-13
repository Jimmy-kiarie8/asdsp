<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ministries', function (Blueprint $table) {
            $table->id();
            $table->string('ministry_name')->unique();
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')
                ->onUpdate('No Action')->onDelete('No Action');
            $table->timestamps();
            $table->softDeletes();
            
        });
        $list=array("Ministry of Tourism  and Wildlife",
               "Ministry of Energy and Petroleum",
               "Ministry of Interior and Coordination of National Government",
               "Ministry of Finance & National Treasury",
               "Ministry of Defence",
               "Ministry of Foreign Affairs & International Trade",
               "Ministry of Health",
               "Ministry of Education",
               "Ministry of Transport and Infrastructure",
               "Ministry of Information, Communication and Technology",
               "Ministry of Environment, and Natural Resource",
               "Ministry of Land, Housing and Urban Development",
               "Ministry of Sports, Culture and the Arts",
               "Ministry of Labour & East Africa Affairs",
               "Ministry of Agriculture, Livestock and Fisheries",
               "Ministry of Industrialization and Enterprise Development",
               "Ministry Of Public Service  And  Gender",
               "Ministry of Mining",
               "Ministry of Water & Irrigation",

        );

           foreach($list as $key)
           {
             DB::table('ministries')->insert([
            'ministry_name' => $key,
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
        Schema::dropIfExists('ministries');
    }
}
