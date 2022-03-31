<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genres')->delete();
        
        \DB::table('genres')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Drama',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Komedi',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Horor',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Petualangan',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'Aksi',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'Animasi',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            6 => 
            array (
                'id' => 10,
                'name' => 'Dokumenter',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            7 => 
            array (
                'id' => 11,
                'name' => 'Keluarga',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            8 => 
            array (
                'id' => 12,
                'name' => 'Persahabatan',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            9 => 
            array (
                'id' => 13,
                'name' => 'Romantis',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            10 => 
            array (
                'id' => 14,
                'name' => 'Fantasi',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            11 => 
            array (
                'id' => 15,
                'name' => 'Fiksi Ilmiah',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            12 => 
            array (
                'id' => 16,
                'name' => 'Thriller',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            13 => 
            array (
                'id' => 17,
                'name' => 'Misteri',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            14 => 
            array (
                'id' => 18,
                'name' => 'Biografi',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
            15 => 
            array (
                'id' => 19,
                'name' => 'Musikal',
                'created_at' => '2022-03-31 08:24:06',
                'updated_at' => '2022-03-31 08:24:06',
            ),
        ));
        
        
    }
}