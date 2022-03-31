<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(OauthClientsTableSeeder::class);
        $this->call(MoviesTableSeeder::class);
        $this->call(MovieActorsTableSeeder::class);
        $this->call(MovieCategoriesTableSeeder::class);
        $this->call(MovieCountriesTableSeeder::class);
        $this->call(MovieDirectorsTableSeeder::class);
        $this->call(MovieGenresTableSeeder::class);
        $this->call(MovieTagsTableSeeder::class);
    }
}
