<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 4,
                'parent_id' => NULL,
                'name' => 'Drama',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            1 => 
            array (
                'id' => 5,
                'parent_id' => NULL,
                'name' => 'Komedi',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            2 => 
            array (
                'id' => 6,
                'parent_id' => NULL,
                'name' => 'Horor',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            3 => 
            array (
                'id' => 7,
                'parent_id' => NULL,
                'name' => 'Petualangan',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            4 => 
            array (
                'id' => 8,
                'parent_id' => NULL,
                'name' => 'Aksi',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            5 => 
            array (
                'id' => 9,
                'parent_id' => NULL,
                'name' => 'Animasi',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            6 => 
            array (
                'id' => 10,
                'parent_id' => NULL,
                'name' => 'Dokumenter',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            7 => 
            array (
                'id' => 11,
                'parent_id' => NULL,
                'name' => 'Keluarga',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            8 => 
            array (
                'id' => 12,
                'parent_id' => NULL,
                'name' => 'Persahabatan',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            9 => 
            array (
                'id' => 13,
                'parent_id' => NULL,
                'name' => 'Romantis',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            10 => 
            array (
                'id' => 14,
                'parent_id' => NULL,
                'name' => 'Fantasi',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            11 => 
            array (
                'id' => 15,
                'parent_id' => NULL,
                'name' => 'Fiksi Ilmiah',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            12 => 
            array (
                'id' => 16,
                'parent_id' => NULL,
                'name' => 'Thriller',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            13 => 
            array (
                'id' => 17,
                'parent_id' => NULL,
                'name' => 'Misteri',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            14 => 
            array (
                'id' => 18,
                'parent_id' => NULL,
                'name' => 'Biografi',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
            15 => 
            array (
                'id' => 19,
                'parent_id' => NULL,
                'name' => 'Musikal',
                'created_at' => '2022-03-31 15:24:06',
                'updated_at' => '2022-03-31 15:24:06',
            ),
        ));
        
        
    }
}