<?php

namespace App\Http\Middleware;

use Closure;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth('api')->user();
        if (empty($user)) {
            return response()->json([
                'status' => 'fail',
                'messages' => ['You dont have access to this feature, please contact admin']
            ]);
        }

        if ($user->level != 'admin') {
            return response()->json([
                'status' => 'fail',
                'messages' => ['You dont have access to this feature, please contact admin']
            ]);
        }

        return $next($request);
    }
}
