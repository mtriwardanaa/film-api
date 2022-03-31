<?php

use Illuminate\Database\Seeder;

class MovieDirectorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('movie_directors')->delete();
        
        \DB::table('movie_directors')->insert(array (
            0 => 
            array (
                'id' => 3,
                'movie_id' => 14,
                'name' => 'Tye Banks',
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            1 => 
            array (
                'id' => 12,
                'movie_id' => 20,
                'name' => 'Tye Banks',
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
        ));
        
        
    }
}