<?php

use Illuminate\Database\Seeder;

class AclTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Block table roles
	    DB::table('roles')->delete();
        $roles = [
        	['id'=>1, 'code'=>'SUP', 'name'=>'Super Admin', 'label'=>'User with this role will have full access to apllication'],
            ['id'=>2, 'code'=>'ADM', 'name'=>'Administrator', 'label'=>'User with this role will have semi-full access to apllication'],
            ['id'=>3, 'code'=>'PMR', 'name'=>'Project Manager', 'label'=>'User with this role will have semi-full access to apllication'],
        	['id'=>4, 'code'=>'ENG', 'name'=>'Engineer', 'label'=>'User with this role will have semi-full access to apllication'],
        ];
        DB::table('roles')->insert($roles);
	    //ENDBlock table roles

	    //Block table role_user
	    DB::table('role_user')->delete();
        $role_user = [
        	['role_id'=>1, 'user_id'=>1],
        	['role_id'=>3, 'user_id'=>2],
            ['role_id'=>3, 'user_id'=>3],
            ['role_id'=>3, 'user_id'=>4],
            ['role_id'=>4, 'user_id'=>5],
            ['role_id'=>4, 'user_id'=>6],
            ['role_id'=>4, 'user_id'=>7],
        ];
        DB::table('role_user')->insert($role_user);
        //ENDBlock table role_user

         //Block table permissions
        DB::table('permissions')->delete();
        $permissions = [
            //user module
            ['slug'=>'index-user', 'name'=>'Index User', 'description'=>'View All index useres'],
            ['slug'=>'show-user', 'name'=>'Show User','description'=>'View single user'],
            ['slug'=>'create-user', 'name'=>'Create User', 'description'=>'Create user'],
            ['slug'=>'edit-user', 'name'=>'Edit User', 'description'=>'Access user Edit method'],
            ['slug'=>'delete-user', 'name'=>'Delete User', 'description'=>'Access user Delete method'],
        ];
        DB::table('permissions')->insert($permissions);
        //ENDBlock table permissions

        //Block table permission_role
        DB::table('permission_role')->delete();
        $permission_role = [
        	//Administrator privilleges
        	['permission_id'=>1, 'role_id'=>2],
        	['permission_id'=>2, 'role_id'=>2],
        	['permission_id'=>3, 'role_id'=>2],
        	['permission_id'=>4, 'role_id'=>2],
        ];
        DB::table('permission_role')->insert($permission_role);
        //ENDBlock table permission_role
    }
}
