<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table("roles")->insert([
           ['name'=>"Admin","display_name"=>"Quản Trị Hệ Thống"],
           ['name'=>"Guest","display_name"=>"Khách Hàng"],
           ['name'=>"Developer","display_name"=>"Phát Triển Hệ Thống"],
           ['name'=>"Writer","display_name"=>"Viết bài"],
       ]);
    }
}
