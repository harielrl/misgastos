<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LocalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); 
        for ($i=0; $i < 20; $i++){
            \DB::table('localidades')->insert(array(
                'localidad'=>$faker->city,
                'provincia'=>$faker->postcode,  
                'cp'=>$faker->postcode,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
                ));    
        }   
        
    }
}
