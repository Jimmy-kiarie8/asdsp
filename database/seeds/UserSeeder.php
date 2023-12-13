<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'name' => 'System Admin',
            'email'=>'admin@mandera.com',
            'username'=>'Syadmin',
            'password'=>bcrypt('secret'),
            'phone'=>'254708236804',
            'user_type'=>'Internal',
            'org_id'=>11,
            'role_id'=>'SuperAdmin',
            'verification_code'=>"12345678",
             'created_at'=>date('Y-m-d H:i:s'),
             'updated_at'=>date('Y-m-d H:i:s'),
             'confirmed_at'=>date('Y-m-d H:i:s'),
            ]);

         $user=User::latest('id')->first();
          DB::table('profiles')->insert([
            'user_id' => $user->id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
           ]);

         

          $user->givePermissionTo(['Add Users','Delete Users','Block Users',"Edit Users","Reset User Passwords"]);
          $user->assignRole('SuperAdmin');
    }
}
