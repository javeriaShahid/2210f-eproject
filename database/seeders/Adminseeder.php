<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email_verified_at = date('Y-m-d H:i:s', strtotime('now'));
        \DB::table('users')->insert(
            array(
               'name'=> 'Hassan Murad' , 'username' => 'hassanMurad!223' ,'email' =>'hassan2109f@aptechgdn.net' ,'password' => bcrypt(12345678) ,'is_blocked' => 0 ,'email_verified_at' => $email_verified_at , 'contact_number' => '3030239865' , 'phone_code' => '+92' , 'role' => 1 , 'status' => 0
            ) ,
            array(
                'name'=> 'Javeria Shahid' , 'username'=> 'javeria.123' , 'email' => 'javeria2210e@aptechgdn.net', 'password' => bcrypt(12345679) , 'is_blocked' => 0 , 'email_verified_at' => $email_verified_at , 'contact_number' => '3182745469' , 'phone_code' => '+92' , 'role' => 1 , 'status' => 0
            ) ,
            array(

            ) ,
            array(

            ) ,

        );
    }
}
