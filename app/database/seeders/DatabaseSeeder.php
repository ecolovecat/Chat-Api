<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
    }
}

class UserSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert(
            [
                "name"=>"Phuong",
                "email"=>"hanhphuong@gmail.com",
                "password"=>bcrypt('password')
            ]
        );

        DB::table('users')->insert(
            [
                "name"=>"Duy",
                "email"=>"duyphuong@gmail.com",
                "password"=>bcrypt('password')
            ]
        );

        DB::table('users')->insert(
            [
                "name"=>"Kaka",
                "email"=>"kaka@gmail.com",
                "password"=>bcrypt('password')
            ]
        );

        DB::table('groups')->insert(
            [
                "group_name"=>"Group name 1",
                'created_at' => NOW(),
        	    'updated_at' => NOW()
            ]
        );

        DB::table('groups')->insert(
            [
                "group_name"=>"Group name 2",
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        );

    }
}
