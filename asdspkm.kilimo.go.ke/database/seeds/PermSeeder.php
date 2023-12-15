<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Modules\Usermanagement\Entities\Permission;


class PermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Add Users',"perm_category"=>"User Management"]);
        Permission::create(['name' => 'View System Users',"perm_category"=>"User Management"]);
        Permission::create(['name' => 'Delete Users',"perm_category"=>"User Management"]);
        Permission::create(['name' => 'Block Users',"perm_category"=>"User Management"]);
        Permission::create(['name' => 'Edit Users',"perm_category"=>"User Management"]);
         Permission::create(['name' => 'Reset User Passwords',"perm_category"=>"User Management"]);

        Permission::create(['name' => 'Add Entity Type',"perm_category"=>"Entity Management"]);
        Permission::create(['name' => 'add New Entity',"perm_category"=>"Entity Management"]);
         Permission::create(['name' => 'Edit New Entity',"perm_category"=>"Entity Management"]);


          Permission::create(['name' => 'manage applicants',"perm_category"=>"Applicant Management"]);
          Permission::create(['name' => 'manage applications',"perm_category"=>"Applicant Management"]);

           Permission::create(['name' => 'First Review Applications',"perm_category"=>"Applicant Management"]);
           Permission::create(['name' => 'second Review Applications',"perm_category"=>"Applicant Management"]);

            Permission::create(['name' => 'Third Review Applications',"perm_category"=>"Applicant Management"]);

            Permission::create(['name' => 'Interview Applicant',"perm_category"=>"Applicant Management"]);
     
     
     



        
      

         Permission::create(['name' => 'View Admin Dashboard',"perm_category"=>"Dashboard Management"]);
      

        // create roles and assign created permissions

        // this can be done as separate statements
        /*$role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');*/


        $role = Role::create(['name' => 'SuperAdmin']);
        $role->givePermissionTo(Permission::all());
       $entityadmin = Role::create(['name' => 'Applicant']);

    }
}
