<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'name' => 'owner pertamina',
                'address'=>'jl cendana putih',
                'phone'=>'08522541236',
                'type'=>'owner',
                'user_id'=>3,
                'distributor_id'=>1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'employee pertamina',
                'address'=>'jl cendrawasih',
                'phone'=>'08522541252',
                'type'=>'employee',
                'user_id'=>4,
                'distributor_id'=>1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'owner pupuk kaltim',
                'address'=>'jl kariangau no 5',
                'phone'=>'0852254147',
                'type'=>'owner',
                'user_id'=>5,
                'distributor_id'=>2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'employee pupuk kaltim',
                'address'=>'jl prapatan no 90',
                'phone'=>'08523265485',
                'type'=>'employee',
                'user_id'=>6,
                'distributor_id'=>2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'owner badak lng',
                'address'=>'jl pramuka 80',
                'phone'=>'08524511236',
                'type'=>'owner',
                'user_id'=>7,
                'distributor_id'=>3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'employee badak lng',
                'address'=>'jl perjuangan 60',
                'phone'=>'0852365471',
                'type'=>'employee',
                'user_id'=>8,
                'distributor_id'=>3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
