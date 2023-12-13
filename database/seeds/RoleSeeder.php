<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Modules\Usermanagement\Entities\Permission;

class RoleSeeder extends Seeder
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

       
        Permission::create(['name' => 'add New Organization',"perm_category"=>"Entity Management"]);
         Permission::create(['name' => 'Edit Organization',"perm_category"=>"Entity Management"]);
     



        
      

         Permission::create(['name' => 'View Admin Dashboard',"perm_category"=>"Dashboard Management"]);
      

        // create roles and assign created permissions

        // this can be done as separate statements
        /*$role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');*/


        $role = Role::create(['name' => 'SuperAdmin']);
        $role->givePermissionTo(Permission::all());
       $entityadmin = Role::create(['name' => 'Organization']);
          $staf = Role::create(['name' => 'Member']);

       




       /* $procedure = "
CREATE PROCEDURE getRoleList()
BEGIN
select roles.id,roles.name,roles.description as number,GROUP_CONCAT(permissions.name SEPARATOR ', ') as role_has_permissions,roles.created_at from roles join role_has_permissions on role_has_permissions.role_id=roles.id
join permissions on permissions.id=role_has_permissions.permission_id
left join model_has_roles on model_has_roles.role_id=roles.id
group by role_has_permissions.role_id;
end";

DB::unprepared("DROP procedure IF EXISTS getRoleList");
DB::unprepared($procedure);*/
       
    }
}
