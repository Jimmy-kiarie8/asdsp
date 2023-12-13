<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	$this->call(PermSeeder::class);
       
        //$this->call(UsersTableSeeder::class);



         $this->call(UserSeeder::class);
          $this->call(SubCountySeeder::class);
    }
}
