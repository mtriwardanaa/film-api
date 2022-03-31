<?php

namespace Modules\Genre\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Lib\MyHelper;
use App\Model\Genre;

class ApiGenreController extends Controller
{
    public function list()
    {
        $list = Genre::orderBy('name', 'ASC')->get()->toArray();
        return response()->json(MyHelper::checkGet($list));
    }
}
