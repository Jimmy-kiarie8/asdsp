<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovationCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovation_categories', function (Blueprint $table) {
             $table->increments('id');
             $table->string('category_name',200)->unique()->nullable();
             $table->timestamps();
            //
        });

         $list=array(
            "Animal / crop Breeding innovations",
            "Animal feeding innovations",
            "Information (Weather, Market, Technical) dissemination innovations",
            "Cooling innovations",
            "Drying innovations",
            "Transportation innovations",
            "Packaging & Branding",
            "Value Addition (Processing) innovations",
            "Food/Product safety innovations"
        );


          foreach($list as $key)
         {
            DB::table('innovation_categories')->insert([
            'category_name' =>trim($key),
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
         Schema::dropIfExists('innovation_categories');
         
        
    }
}
