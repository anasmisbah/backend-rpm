<?php

use Illuminate\Database\Seeder;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('distributors')->insert([
            [
                'name' => 'PT. Pertamina',
                'address'=>'jl cendana no 1',
                'member'=>'gold',
                'phone'=>'08523212546',
                'email'=>'contact@pertamina.com',
                'website'=>'www.pertamina.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'PT Pupuk Kalimantan Timur',
                'address'=>'jl james simanjuntak',
                'member'=>'platinum',
                'phone'=>'085746575',
                'email'=>'contact@pupukkaltim.com',
                'website'=>'www.pupukkaltim.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'PT Badak LNG',
                'address'=>'jl pangeran antasari',
                'member'=>'silver',
                'phone'=>'08574656',
                'email'=>'contact@badaklng.com',
                'website'=>'www.badaklng.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
