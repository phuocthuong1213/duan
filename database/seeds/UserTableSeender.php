<?php

use Illuminate\Database\Seeder;

class UserTableSeender extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Nguyễn Phước Thượng','email' => 'phuocthuong1213@gmail.com','password' => bcrypt('123456'),'level'=> 1],
            ['name'=>'Admin','email' => 'admin@gmail.com','password' => bcrypt('123456'),'level'=> 1]
        ];
        DB::table('users')->insert($data);
    }
}
