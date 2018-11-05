<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientesSeeder extends Seeder
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
            \DB::table('clientes')->insert(array(
                'cliente'=>$faker->firstNameFemale,
                'domicilio'=>$faker->address,  
                'telefono'=>$faker->phoneNumber,
                'iva_id'=>$faker->randomElement(['1','2','3','4']),
                'cuit'=> '20123456781', 
                'localidad_id'=>$faker->randomElement(['1','2','3','4']),
                'ingbruto_id'=>'1',
                'percepcion_id'=>'2',
                'mail'=>$faker->email,
                'saldoinicial'=> $faker->randomElement(['100','200','3000','400']),
                'saldo'=> '0',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
                ));    
        }   
        
    }
}
