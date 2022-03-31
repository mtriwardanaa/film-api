<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MovieTagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('movie_tags')->delete();
        
        \DB::table('movie_tags')->insert(array (
            0 => 
            array (
                'id' => 3,
                'movie_id' => 14,
                'tag' => 'messy',
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            1 => 
            array (
                'id' => 4,
                'movie_id' => 14,
                'tag' => '2022',
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            2 => 
            array (
                'id' => 21,
                'movie_id' => 20,
                'tag' => '2022',
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
        ));
        
        
    }
}