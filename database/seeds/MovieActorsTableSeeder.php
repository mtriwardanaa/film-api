<?php

use Illuminate\Database\Seeder;

class MovieActorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('movie_actors')->delete();
        
        \DB::table('movie_actors')->insert(array (
            0 => 
            array (
                'id' => 23,
                'movie_id' => 14,
                'name' => 'Blak Roze',
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            1 => 
            array (
                'id' => 24,
                'movie_id' => 14,
                'name' => 'Corwin Evans',
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            2 => 
            array (
                'id' => 25,
                'movie_id' => 14,
                'name' => 'Dink Kearney',
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            3 => 
            array (
                'id' => 26,
                'movie_id' => 14,
                'name' => 'Iris Medina',
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            4 => 
            array (
                'id' => 27,
                'movie_id' => 14,
                'name' => 'Kimberly Daniece',
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            5 => 
            array (
                'id' => 28,
                'movie_id' => 14,
                'name' => 'Mercedes Cooper',
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            6 => 
            array (
                'id' => 29,
                'movie_id' => 14,
                'name' => 'Tony Barbadose',
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            7 => 
            array (
                'id' => 86,
                'movie_id' => 20,
                'name' => 'Ali Fazal',
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
            8 => 
            array (
                'id' => 87,
                'movie_id' => 20,
                'name' => 'Annette Bening',
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
            9 => 
            array (
                'id' => 88,
                'movie_id' => 20,
                'name' => 'Armie Hammer',
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
            10 => 
            array (
                'id' => 89,
                'movie_id' => 20,
                'name' => 'Gal Gadot',
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
            11 => 
            array (
                'id' => 90,
                'movie_id' => 20,
                'name' => 'Kenneth Branagh',
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
            12 => 
            array (
                'id' => 91,
                'movie_id' => 20,
                'name' => 'Russell Brand',
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
            13 => 
            array (
                'id' => 92,
                'movie_id' => 20,
                'name' => 'Tom Bateman',
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
        ));
        
        
    }
}