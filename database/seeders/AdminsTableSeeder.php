<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('1234556');
        $adminRecords = [
            ['id' =>1,'name'=>'Admin','type'=>'admin','mobile'=>980000000,'email'=>'admin@wlan.com','password'=>$password,'image'=>'','status'=>1],
        ];

        Admin::insert($adminRecords);
    }
}