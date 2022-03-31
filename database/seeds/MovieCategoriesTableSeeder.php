<?php

use Illuminate\Database\Seeder;

class MovieCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('movie_categories')->delete();
        
        \DB::table('movie_categories')->insert(array (
            0 => 
            array (
                'id' => 19,
                'movie_id' => 14,
                'category_id' => 8,
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            1 => 
            array (
                'id' => 20,
                'movie_id' => 14,
                'category_id' => 9,
                'created_at' => '2022-03-31 10:15:14',
                'updated_at' => '2022-03-31 10:15:14',
            ),
            2 => 
            array (
                'id' => 40,
                'movie_id' => 20,
                'category_id' => 8,
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
            3 => 
            array (
                'id' => 41,
                'movie_id' => 20,
                'category_id' => 9,
                'created_at' => '2022-03-31 17:13:20',
                'updated_at' => '2022-03-31 17:13:20',
            ),
        ));
        
        
    }
}