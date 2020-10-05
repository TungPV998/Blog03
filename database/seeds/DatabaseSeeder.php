<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        \Illuminate\Support\Facades\DB::table("admins")->insert([
            "name_admin"=>"Pham Van Tung",
            "address_admin"=>"Ha Noi",
            "password_admin"=>Hash::make("123456"),
            "email_admin"=>"admin@gmail.com"
        ]);
    }
}
