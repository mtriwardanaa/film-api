<?php

namespace Modules\Movie\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Crypt;

use App\Lib\MyHelper;
use App\Model\User;
use App\Model\Category;
use App\Model\Movie;
use App\Model\MovieCategory;
use App\Model\MovieGenre;
use App\Model\MovieCountry;
use App\Model\MovieActor;
use App\Model\MovieDirector;
use App\Model\MovieTag;

use DB;

use Modules\Movie\Http\Requests\CreateMovie;

class ApiMovieController extends Controller
{
    public function listByData()
    {
        $list = Movie::with('movieActors')->orderBy('release_date', 'DESC')->get()->toArray();
        return response()->json(MyHelper::checkGet($list));
    }

    public function listByCategory()
    {
        $list = Category::orderBy('name', 'ASC')->get()->toArray();
        return response()->json(MyHelper::checkGet($list));
    }

    public function create(CreateMovie $request)
    {
        DB::beginTransaction();
        $post = $request->json()->all();

        $data = [
            "title" => $post['title'],
            "cover" => $post['cover'],
            "source" => $post['source'],
            "trailer" => $post['trailer'],
            "desc" => $post['desc'],
            "duration" => $post['duration'],
            "quality" => $post['quality'],
            "release_date" => date('Y-m-d', strtotime($post['release_date'])),
            "rating" => $post['rating'],
            "coming_soon" => $post['coming_soon'],
        ];

        $create = Movie::create($data);
        if (!$create) {
            DB::rollback();
            return response()->json(MyHelper::checkCreate($create));
        }

        if (isset($post['categories'])) {
            $data_categories = [];

            foreach ($post['categories'] as $key => $category) {
                $data_categories[] = [
                    'movie_id' => $create['id'],
                    'category_id' => Crypt::decryptString($category),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }

            $insert_categories = MovieCategory::insert($data_categories);
            if (!$insert_categories) {
                DB::rollback();
                return response()->json(MyHelper::checkCreate($insert_categories));
            }

        }

        if (isset($post['genres'])) {
            $data_genres = [];

            foreach ($post['genres'] as $key => $genre) {
                $data_genres[] = [
                    'movie_id' => $create['id'],
                    'genre_id' => Crypt::decryptString($genre),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }

            $insert_genres = MovieGenre::insert($data_genres);
            if (!$insert_genres) {
                DB::rollback();
                return response()->json(MyHelper::checkCreate($insert_genres));
            }

        }

        if (isset($post['countries'])) {
            $data_countries = [];

            foreach ($post['countries'] as $key => $country) {
                $data_countries[] = [
                    'movie_id' => $create['id'],
                    'country_id' => Crypt::decryptString($country),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }

            $insert_countries = MovieCountry::insert($data_countries);
            if (!$insert_countries) {
                DB::rollback();
                return response()->json(MyHelper::checkCreate($insert_countries));
            }

        }

        if (isset($post['actors'])) {
            $data_actors = [];

            foreach ($post['actors'] as $key => $actor) {
                $data_actors[] = [
                    'movie_id' => $create['id'],
                    'name' => $actor,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }

            $insert_actors = MovieActor::insert($data_actors);
            if (!$insert_actors) {
                DB::rollback();
                return response()->json(MyHelper::checkCreate($insert_actors));
            }

        }

        if (isset($post['directors'])) {
            $data_directors = [];

            foreach ($post['directors'] as $key => $director) {
                $data_directors[] = [
                    'movie_id' => $create['id'],
                    'name' => $director,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }

            $insert_directors = MovieDirector::insert($data_directors);
            if (!$insert_directors) {
                DB::rollback();
                return response()->json(MyHelper::checkCreate($insert_directors));
            }

        }

        if (isset($post['tags'])) {
            $data_tags = [];

            foreach ($post['tags'] as $key => $tag) {
                $data_tags[] = [
                    'movie_id' => $create['id'],
                    'tag' => $tag,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }

            $insert_tags = MovieTag::insert($data_tags);
            if (!$insert_tags) {
                DB::rollback();
                return response()->json(MyHelper::checkCreate($insert_tags));
            }

        }

        // DB::commit();
        return response()->json(MyHelper::checkCreate($create));
    }
}
