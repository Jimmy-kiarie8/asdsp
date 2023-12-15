<?php

use Illuminate\Database\Seeder;

class ChainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $list=array("Broiler","Cow Milk","Kales","Banana","Indigenous Chicken","Rice"
                    ,"French Beans","Mango","Irish Potato","Maize","Sorghum","Camel Milk",
                    "Meat Goat","Tomato","Fish","Beef","Honey","African Bird Eye Chilli","Cassava","Passion Fruit","Cashew Nut","Ground Nut","Sweet Potato",
                    "Pyrethrum",

                );


         foreach($list as $key)
         {
            DB::table('value_chains')->insert([
            'value_name' =>trim($key),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
           ]);

         }

    }
}
