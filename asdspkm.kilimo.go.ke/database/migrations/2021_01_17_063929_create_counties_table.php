<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counties', function (Blueprint $table) {
            $table->id();
            $table->string('county_name')->unique()->nullable();
             $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')
                ->onUpdate('No Action')->onDelete('No Action');
                
            $table->timestamps();
        });

        $counties=array("Nairobi","Kitui","Machakos","Makueni","Kiambu","Kajiado","Kilifi","Tana River","Lamu","Garissa",
            "Wajir","Mandera","Mombasa","Kwale","Taita-Taveta","Kakamega","Vihiga","Bungoma","Busia","Siaya",
            "Kisumu","Homa Bay","Migori","Kisii","Nyamira","Turkana","West Pokot","Trans Nzoia","Uasin Gishu","Elgeyo-Marakwet","Nandi","Nyandarua","Samburu","Baringo","Nakuru","Narok","Kericho","Bomet","Marsabit","Isiolo","Meru","Tharaka-Nithi","Embu","Nyeri","Kirinyaga","Muranga","Laikipia"
    );


         foreach($counties as $key)
         {
            DB::table('counties')->insert([
            'county_name' =>$key,
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
        Schema::dropIfExists('counties');
    }
}
