<?php

namespace Modules\Movie\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Lib\MyHelper;
use App\Model\User;
use App\Model\Movie;

class ApiMovieController extends Controller
{
    public function listByData()
    {
        $list = Movie::with('movieActors')->orderBy('release_date', 'DESC')->get()->toArray();
        return response()->json(MyHelper::checkGet($list));
    }

    public function listByCategory()
    {
        $list = Movie::orderBy('release_date', 'DESC')->get()->toArray();
        return response()->json(MyHelper::checkGet($list));
    }
}
