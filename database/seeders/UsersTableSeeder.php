<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => '$2a$12$o4b0f4MP9L6nc4B4RUb1..hT27ocRotqgVKocGrvNv8WOJq0MHz8S',
                'level' => 'admin',
                'remember_token' => NULL,
                'created_at' => '2022-03-30 15:01:36',
                'updated_at' => '2022-03-30 15:01:40',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'email' => 'user@gmail.com',
                'username' => 'user',
                'password' => '$2a$12$o4b0f4MP9L6nc4B4RUb1..hT27ocRotqgVKocGrvNv8WOJq0MHz8S',
                'level' => 'user',
                'remember_token' => NULL,
                'created_at' => '2022-03-30 15:01:36',
                'updated_at' => '2022-03-30 15:01:40',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'username' => 'user1',
                'password' => '$2y$10$bOKEWN4GD07rgN0qZq1emOHaN2CPJUpLXe1i6PhHEFpoxJXHUHrpC',
                'level' => 'user',
                'remember_token' => NULL,
                'created_at' => '2022-03-31 16:41:08',
                'updated_at' => '2022-03-31 16:41:08',
            ),
        ));
        
        
    }
}