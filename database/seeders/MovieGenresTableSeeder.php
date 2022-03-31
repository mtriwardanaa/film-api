<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MovieGenresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('movie_genres')->delete();
        
        \DB::table('movie_genres')->insert(array (
            0 => 
            array (
                'id' => 16,
                'movie_id' => 14,
                'genre_id' => 8,
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            1 => 
            array (
                'id' => 17,
                'movie_id' => 14,
                'genre_id' => 9,
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            2 => 
            array (
                'id' => 18,
                'movie_id' => 14,
                'genre_id' => 18,
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            3 => 
            array (
                'id' => 43,
                'movie_id' => 20,
                'genre_id' => 8,
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
            4 => 
            array (
                'id' => 44,
                'movie_id' => 20,
                'genre_id' => 9,
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
            5 => 
            array (
                'id' => 45,
                'movie_id' => 20,
                'genre_id' => 18,
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
        ));
        
        
    }
}