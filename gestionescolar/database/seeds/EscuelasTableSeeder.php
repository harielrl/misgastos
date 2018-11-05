<?php

use Illuminate\Database\Seeder;

class EscuelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escuelas')->insert([
            'id'=> 1,
            'nombre'=> 'epet3',
            

        ]);
        DB::table('escuelas')->insert([
            'id'=> 2,
            'nombre'=> 'epet2',
            

        ]);
        //
    }
}
