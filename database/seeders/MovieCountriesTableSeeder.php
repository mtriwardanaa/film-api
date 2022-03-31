<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MovieCountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('movie_countries')->delete();
        
        \DB::table('movie_countries')->insert(array (
            0 => 
            array (
                'id' => 5,
                'movie_id' => 14,
                'country_id' => 1,
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            1 => 
            array (
                'id' => 17,
                'movie_id' => 20,
                'country_id' => 1,
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
        ));
        
        
    }
}