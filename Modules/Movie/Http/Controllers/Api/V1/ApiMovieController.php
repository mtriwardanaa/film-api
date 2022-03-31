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
use App\Model\MovieFavorite;
use App\Model\MovieRating;

use DB;

use Modules\Movie\Http\Requests\CreateMovie;
use Modules\Movie\Http\Requests\DeleteMovie;
use Modules\Movie\Http\Requests\UpdateMovie;
use Modules\Movie\Http\Requests\FavoriteMovie;
use Modules\Movie\Http\Requests\RatingMovie;

class ApiMovieController extends Controller
{
    public function listByData()
    {
        $list = Movie::with('movieCountries.country')->orderBy('release_date', 'DESC')->get()->toArray();
        return response()->json(MyHelper::checkGet($list));
    }

    public function listByCategory()
    {
        $list = Category::with('movieCategories.movie')->orderBy('name', 'ASC')->get()->toArray();
        return response()->json(MyHelper::checkGet($list));
    }

    public function listComingSoon()
    {
        $list = Movie::with('movieCountries.country')->where('coming_soon', 1)->orderBy('release_date', 'DESC')->get()->toArray();
        return response()->json(MyHelper::checkGet($list));
    }

    public function favorite(FavoriteMovie $request)
    {
        $post = $request->json()->all();
        $id = Crypt::decryptString($post['movie_id']);

        $check = Movie::where('id', $id)->first();
        if (empty($check)) {
            return response()->json([
                'status' => 'fail', 
                'messages' => ['Movie not found']
            ]);
        }

        $user = auth('api')->user();

        if ($post['favorite']) {
            $favorite = [
                'movie_id' => $id,
                'user_id' => $user->id
            ];

            $create = MovieFavorite::updateOrCreate(['movie_id' => $id, 'user_id' => $user->id], $favorite);
            return response()->json(MyHelper::checkCreate($create));
        }

        $check_favorite = MovieFavorite::where('movie_id', $id)->where('user_id', $user->id)->first();
        if (empty($check_favorite)) {
            return response()->json([
                'status' => 'fail', 
                'messages' => ['Movie not found']
            ]);
        }

        $check_favorite->delete();
        return response()->json(MyHelper::checkDelete($check_favorite));
    }

    public function rating(RatingMovie $request)
    {
        DB::beginTransaction();
        $post = $request->json()->all();

        $id = Crypt::decryptString($post['movie_id']);

        $check = Movie::where('id', $id)->first();
        if (empty($check)) {
            DB::rollback();
            return response()->json([
                'status' => 'fail', 
                'messages' => ['Movie not found']
            ]);
        }

        $user = auth('api')->user();

        $data = [
            'movie_id' => $id,
            'user_id' => $user->id,
            'rating' => $post['rating']
        ];

        $create = MovieRating::updateOrCreate(['movie_id' => $id, 'user_id' => $user->id], $data);
        if (!$create) {
            DB::rollback();
            return response()->json([
                'status' => 'fail', 
                'messages' => ['Rating movie failed']
            ]);
        }

        $sum = MovieRating::where('movie_id', $id)->avg('rating');
        $check->rating = $sum;
        $check->update();
        if (!$check) {
            DB::rollback();
            return response()->json([
                'status' => 'fail', 
                'messages' => ['Rating movie failed']
            ]);
        }

        DB::commit();
        return response()->json(MyHelper::checkCreate($create));
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

        DB::commit();
        return response()->json(MyHelper::checkCreate($create));
    }

    public function update(UpdateMovie $request)
    {
        DB::beginTransaction();
        $post = $request->json()->all();

        $id = Crypt::decryptString($post['movie_id']);

        $check = Movie::where('id', $id)->first();
        if (empty($check)) {
            DB::rollback();
            return response()->json([
                'status' => 'fail', 
                'messages' => ['Movie not found']
            ]);
        }

        $check->title = $post['title'];
        $check->cover = $post['cover'];
        $check->trailer = $post['trailer'];
        $check->source = $post['source'];
        $check->desc = $post['desc'];
        $check->duration = $post['duration'];
        $check->quality = $post['quality'];
        $check->coming_soon = $post['coming_soon'];
        $check->release_date = date('Y-m-d', strtotime($post['release_date']));
        $check->update();

        if (!$check) {
            DB::rollback();
            return response()->json([
                'status' => 'fail', 
                'messages' => ['Update movie failed']
            ]);
        }

        if (isset($post['categories'])) {
            $categories = MovieCategory::where('movie_id', $id)->get();
            if (!empty($categories)) {
                $delete = $categories->each->delete();
                if (!$delete) {
                    DB::rollback();
                    return response()->json([
                        'status' => 'fail', 
                        'messages' => ['Update movie categories failed']
                    ]);
                }
            }

            $data_categories = [];

            foreach ($post['categories'] as $key => $category) {
                $data_categories[] = [
                    'movie_id' => $id,
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
            $genres = MovieGenre::where('movie_id', $id)->get();
            if (!empty($genres)) {
                $delete = $genres->each->delete();
                if (!$delete) {
                    DB::rollback();
                    return response()->json([
                        'status' => 'fail', 
                        'messages' => ['Update movie genres failed']
                    ]);
                }
            }

            $data_genres = [];

            foreach ($post['genres'] as $key => $genre) {
                $data_genres[] = [
                    'movie_id' => $id,
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
            $countries = MovieCountry::where('movie_id', $id)->get();
            if (!empty($countries)) {
                $delete = $countries->each->delete();
                if (!$delete) {
                    DB::rollback();
                    return response()->json([
                        'status' => 'fail', 
                        'messages' => ['Update movie countries failed']
                    ]);
                }
            }

            $data_countries = [];

            foreach ($post['countries'] as $key => $country) {
                $data_countries[] = [
                    'movie_id' => $id,
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
            $actors = MovieActor::where('movie_id', $id)->get();
            if (!empty($actors)) {
                $delete = $actors->each->delete();
                if (!$delete) {
                    DB::rollback();
                    return response()->json([
                        'status' => 'fail', 
                        'messages' => ['Update movie actors failed']
                    ]);
                }
            }

            $data_actors = [];

            foreach ($post['actors'] as $key => $actor) {
                $data_actors[] = [
                    'movie_id' => $id,
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
            $directors = MovieDirector::where('movie_id', $id)->get();
            if (!empty($directors)) {
                $delete = $directors->each->delete();
                if (!$delete) {
                    DB::rollback();
                    return response()->json([
                        'status' => 'fail', 
                        'messages' => ['Update movie directors failed']
                    ]);
                }
            }

            $data_directors = [];

            foreach ($post['directors'] as $key => $director) {
                $data_directors[] = [
                    'movie_id' => $id,
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
            $tags = MovieTag::where('movie_id', $id)->get();
            if (!empty($tags)) {
                $delete = $tags->each->delete();
                if (!$delete) {
                    DB::rollback();
                    return response()->json([
                        'status' => 'fail', 
                        'messages' => ['Update movie tags failed']
                    ]);
                }
            }

            $data_tags = [];

            foreach ($post['tags'] as $key => $tag) {
                $data_tags[] = [
                    'movie_id' => $id,
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

        DB::commit();
        return response()->json(MyHelper::checkCreate($check));
    }

    public function delete(DeleteMovie $request)
    {
        DB::beginTransaction();
        $post = $request->json()->all();
        $id = Crypt::decryptString($post['movie_id']);

        $check = Movie::where('id', $id)->first();
        if (empty($check)) {
            DB::rollback();
            return response()->json([
                'status' => 'fail', 
                'messages' => ['Movie not found']
            ]);
        }

        $delete = $check->delete();

        DB::commit();
        return response()->json(MyHelper::checkDelete($delete));
    }
}
