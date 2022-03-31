<?php

namespace Modules\User\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Lib\MyHelper;
use App\Model\User;

use Modules\User\Http\Requests\CreateUser;

class ApiUserController extends Controller
{
    public function create(CreateUser $request)
    {
        $post = $request->json()->all();

        $data = [
            'name' => $post['name'],
            'email' => $post['email'],
            'username' => $post['username'],
            'password' => \Hash::make($post['password']),
            'level' => $post['level']
        ];

        $create = User::create($data);
        return response()->json(MyHelper::checkCreate($create));
    }
}
