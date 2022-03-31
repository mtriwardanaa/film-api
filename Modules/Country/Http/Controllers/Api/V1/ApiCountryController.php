<?php

namespace Modules\Country\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Lib\MyHelper;
use App\Model\Country;

class ApiCountryController extends Controller
{
    public function list()
    {
        $list = Country::orderBy('name', 'ASC')->get()->toArray();
        return response()->json(MyHelper::checkGet($list));
    }
}
