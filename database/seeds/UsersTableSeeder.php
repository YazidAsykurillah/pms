<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        $users = [
            ['id'=>1, 'name'=>'Jose Mourinho', 'email'=>'mourinho@email.com', 'password'=>bcrypt('pms')],
            ['id'=>2, 'name'=>'Paul Scholes', 'email'=>'scholes@email.com', 'password'=>bcrypt('pms')],
            ['id'=>3, 'name'=>'Ryan Giggs', 'email'=>'giggs@email.com', 'password'=>bcrypt('pms')],
        	['id'=>4, 'name'=>'Ryo Ferdinand', 'email'=>'ferdinand@email.com', 'password'=>bcrypt('pms')],
        	['id'=>5, 'name'=>'Anthony Valencia', 'email'=>'valencia@email.com', 'password'=>bcrypt('pms')],
        	['id'=>6, 'name'=>'Chris Smalling', 'email'=>'smalling@email.com', 'password'=>bcrypt('pms')],
        	['id'=>7, 'name'=>'Phil Jones', 'email'=>'jones@email.com', 'password'=>bcrypt('pms')],
        ];

        \DB::table('users')->insert($users);
    }
}
