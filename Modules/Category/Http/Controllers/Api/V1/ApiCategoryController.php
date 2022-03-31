<?php

namespace Modules\Category\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Lib\MyHelper;
use App\Model\Category;

class ApiCategoryController extends Controller
{
    public function list()
    {
        $list = Category::orderBy('name', 'ASC')->get()->toArray();
        return response()->json(MyHelper::checkGet($list));
    }
}
