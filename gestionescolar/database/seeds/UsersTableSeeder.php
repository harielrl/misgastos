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
        DB::table('users')->insert([
            
            'name'=> 'super admin',
            'email'=> 'hariel@yahoo.com.ar',
            'password'=>bcrypt('123456'),

        ]);
        //
    }
}
