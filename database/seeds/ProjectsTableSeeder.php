<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('projects')->delete();
        $data = [
        	[ 'id'=>1, 'client_id'=>1, 'code'=>'P-20171129-001', 'name'=>'Project 1', 'description'=>'Project 1 description', 'project_manager_id'=>2, 'created_at'=>date('yy-mm-dd h:i:s'), 'updated_at'=>date('yy-mm-dd h:i:s') ],
            [ 'id'=>2, 'client_id'=>2, 'code'=>'P-20171130-002', 'name'=>'Project 2', 'description'=>'Project 2 description', 'project_manager_id'=>3, 'created_at'=>date('yy-mm-dd h:i:s'), 'updated_at'=>date('yy-mm-dd h:i:s') ],
        	[ 'id'=>3, 'client_id'=>2, 'code'=>'P-20171130-001', 'name'=>'Project 3', 'description'=>'Project 3 description', 'project_manager_id'=>3, 'created_at'=>date('yy-mm-dd h:i:s'), 'updated_at'=>date('yy-mm-dd h:i:s') ],
        ];

        \DB::table('projects')->insert($data);
    }
}
